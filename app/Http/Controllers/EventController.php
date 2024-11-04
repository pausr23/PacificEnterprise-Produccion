<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class EventController extends Controller
{
    public function index()
{
    $today = Carbon::today();
    $events = Event::where('event_date', '>=', $today)->get();

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

        $imageUrl = null; // Para almacenar la URL de la imagen

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            try {
                $uploadResult = Cloudinary::upload($image->getPathname(), [
                    'folder' => 'events' // Cambia la carpeta según lo necesites
                ]);
                $imageUrl = $uploadResult->getSecurePath(); // Obtiene la URL de la imagen
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['image' => 'Error al subir la imagen: ' . $e->getMessage()]);
            }
        }

        Event::create([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'image_path' => $imageUrl,
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
            'event_date' => 'required|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $imageUrl = $event->image_path;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            try {

                Cloudinary::destroy($event->image_path);

                $uploadResult = Cloudinary::upload($image->getPathname(), [
                    'folder' => 'events'
                ]);
                $imageUrl = $uploadResult->getSecurePath();
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['image' => 'Error al subir la imagen: ' . $e->getMessage()]);
            }
        }

        $event->update([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'image_path' => $imageUrl,
        ]);

        return redirect()->route('events.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy(Event $event)
    {
        if ($event->image_path) {
            
            Cloudinary::destroy($event->image_path);
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
