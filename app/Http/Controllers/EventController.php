<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $events = Event::where('event_date', '>=', $today)->get();

        // Formatear las fechas antes de devolver los eventos
        $events->transform(function ($event) {
            $event->event_date = Carbon::parse($event->event_date)->format('Y-m-d');
            return $event;
        });

        return response()->json($events);
    }


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');
        }

        Event::create([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'image_path' => $imageName,
        ]);

        return redirect()->route('events.index')->with('success', 'Evento creado exitosamente.');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            $event->image_path = $request->file('image')->store('events', 'public');
        }

        $event->update($request->only('title', 'description', 'event_date'));

        return redirect()->route('events.index')->with('success', 'Evento actualizado');
    }

    public function destroy(Event $event)
    {
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Evento eliminado');
    }

    public function show()
    {
        $events = Event::all(['id', 'title', 'event_date', 'description', 'image_path']);
        return view('events.index', compact('events'));
    }

    public function showEventDetail($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }
}
