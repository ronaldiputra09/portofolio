<?php

namespace App\Http\Livewire\Admin\About;

use App\Models\About;
use App\Models\Sosial;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $name_depan, $name_belakang, $phone, $email, $birthday, $profession, $website, $country, $city, $address, $image, $imageUrl, $about;

    public function render()
    {
        $sosials = Sosial::where('status', 'active')->get();
        return view('livewire.admin.about.index', [
            'sosials' => $sosials,
        ]);
    }

    public function mount()
    {
        $about = About::first();
        if ($about) {
            $this->name_depan = $about->name_depan;
            $this->name_belakang = $about->name_belakang;
            $this->phone = $about->phone;
            $this->email = $about->email;
            $this->birthday = $about->birthday;
            $this->profession = $about->profession;
            $this->website = $about->website;
            $this->country = $about->country;
            $this->city = $about->city;
            $this->address = $about->address;
            $this->imageUrl = $about->image;
            $this->about = $about->about;
        }
    }

    // create function update
    public function update()
    {
        $this->validate([
            'name_depan' => 'required',
            'name_belakang' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'profession' => 'required',
            'website' => 'required|url',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'about' => 'required',
        ]);

        $about = About::first();

        if ($about) {
            $about->update([
                'name_depan' => $this->name_depan,
                'name_belakang' => $this->name_belakang,
                'phone' => $this->phone,
                'email' => $this->email,
                'birthday' => $this->birthday,
                'profession' => $this->profession,
                'website' => $this->website,
                'country' => $this->country,
                'city' => $this->city,
                'address' => $this->address,
                'about' => $this->about,
            ]);
        } else {
            About::create([
                'name_depan' => $this->name_depan,
                'name_belakang' => $this->name_belakang,
                'phone' => $this->phone,
                'email' => $this->email,
                'birthday' => $this->birthday,
                'profession' => $this->profession,
                'website' => $this->website,
                'country' => $this->country,
                'city' => $this->city,
                'address' => $this->address,
                'about' => $this->about,
            ]);
        }

        session()->flash('message', 'Data berhasil diupdate');

        return redirect()->route('admin.about');
    }

    // create function update image
    public function updateImage()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $about = About::first();

        if ($about) {
            $about->update([
                'image' => $this->image->store('about', 'public'),
            ]);
        } else {
            About::create([
                'image' => $this->image->store('about', 'public'),
            ]);
        }

        session()->flash('message', 'Image berhasil diupdate');

        return redirect()->route('admin.about');
    }
}
