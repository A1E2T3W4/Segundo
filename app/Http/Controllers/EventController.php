<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\View\View;

class EventController extends Controller
{

    public function index()
    {
        $search = Request("search");
        $events = Event::all();

        if ("$search") {
            $events = Event::where([
                ["title", "like", "%" . $search . "%"]
            ])->get();
        } else {
            $events = Event::all();
        }

        return view("welcome", ["events" => $events, "search" => $search]);
    }



    public function create()
    {
        return view("events.create");
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        // upload imagem

        if ($request->hasFile("image") &&  $request->file("image")->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path("img/events"), $imageName);

            $event->image = $imageName;
        }
        $user = auth()->user();
        $event->user_id = $user->id;


        $event->save();

        return redirect("/")->with("msg", "Evento criado com sucesso!");
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);

        $eventOwner = \App\Models\User::find($event->user_id);

        return view("events.show", [
            "event" => $event,
            "eventOwner" => $eventOwner
        ]);
    }


    public function dashboard()
    {
        $user = auth()->user();

        $events = Event::where("user_id", $user->id)->get();

        return view("events.dashboard", compact("events"));
    }

    public function destroy($id)
    {

        Event::findOrFail($id)->delete();

        return redirect("/dashboard")->with("mgs", "Evento excluido com sucesso!");
    }


    
public function edit($id)
{
    $event = Event::findOrFail($id);

    return view("events.edit", ["event" => $event]);
}


public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    $data = $request->all();

    if ($request->hasFile("image") && $request->file("image")->isValid()) {

        $requestImage = $request->file("image");

        $extension = $requestImage->extension();

        $imageName = md5(
            $requestImage->getClientOriginalName() . strtotime("now")
        ) . "." . $extension;

        $requestImage->move(public_path("img/events"), $imageName);

        $data["image"] = $imageName;
    }

    $event->update($data);

    return redirect("/dashboard")
        ->with("msg", "Evento editado com sucesso!");
}

}
