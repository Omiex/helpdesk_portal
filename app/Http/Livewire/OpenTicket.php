<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Problem;
use Auth;

class OpenTicket extends Component
{
	use WithFileUploads;

	public $user_id, $ticket_number, $ip_address, $description, $image;
	protected $image_path;

    public function render()
    {
        return view('livewire.open-ticket');
    }

	public function setValues()
	{
		$this->user_id = Auth::user()->id;
		$this->ticket_number = strtoupper(Str::random(8));
	}

	public function resetValues()
	{
		$this->reset(['user_id', 'ticket_number', 'ip_address', 'description', 'image', 'image_path']);
	}

	public function store()
	{
		$this->setValues();

		$validate = $this->validate([
			'user_id' => 'required',
			'ticket_number' => 'required|unique:problems',
			'ip_address' => 'required',
			'description' => 'required|string',
			'image' => 'nullable|image|max:2048',
		]);

		if ($this->image) {
			$this->image_path = $this->image->storeAs('images', $this->ticket_number.'.'.$this->image->getClientOriginalExtension());
		} else {
			$this->image_path = null;
		}

		$problem = Problem::create([
			'user_id' => $this->user_id,
			'ticket_number' => $this->ticket_number,
			'ip_address' => $this->ip_address,
			'description' => $this->description,
			'image_path' => $this->image_path,
		]);

		$this->resetValues();

		if ($problem) {
			return "Open ticket berhasil dikirimkan dengan kode $problem->ticket_number";
		} else {
			return 'Open ticket tidak dapat dikirim';
		}
	}
}
