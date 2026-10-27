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

        $user = auth()->user();

        $hasUserJoined = false;

        if($user) {
            $userEvents = $user->eventsAsparticipant->toArray();

            foreach($userEvents as $userEvent){
                if($userEvent["id"] == $id){
                     $hasUserJoined = true;
                }
            }

        }

        $eventOwner = \App\Models\User::find($event->user_id);

        return view("events.show", [
            "event" => $event,
            "eventOwner" => $eventOwner,
            "hasUserJoined" =>  $hasUserJoined
        ]);
    }



    public function dashboard()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

       
        $events = Event::where('user_id', $user->id)->get();

      
        $eventasparticipant = $user->eventsAsParticipant()->get();

        return view('events.dashboard', [
            'events' => $events,
            'eventasparticipant' => $eventasparticipant
        ]);
    }



    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        
        $event->users()->detach();

      
        $event->delete();

        return redirect('/dashboard')
            ->with('msg', 'Evento excluído com sucesso!');
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


    public function joinEvent(int $id)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $event = Event::findOrFail($id);

        $user->eventsAsParticipant()->attach($id);

        return redirect('/dashboard')
            ->with('msg', 'Participação registada com sucesso!');
    }



    public function leaveEvent($id)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $event = Event::findOrFail($id);

        $user->eventsAsParticipant()->detach($event->id);

        return redirect('/dashboard')
            ->with('msg', 'Deixaste de participar neste evento!');
    }
}
