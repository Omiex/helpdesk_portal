<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
	use WithPagination;

	public
		$user_nik, $user_name,
		$user_divisi, $user_jabatan, $user_lokasi,
		$user_telepon, $user_email, $user_role,
		$search;
	public $limit = 10;
	public $isOpen = 0;

	public function render()
	{
		$this->users = User::orderBy('role')->orderBy('name');
		if ($this->search != '') {
			$search = '%' . join('%', str_split($this->search)) . '%';
			$this->users->where('name', 'like', $search)
				->orWhere('divisi', 'like', $search)
				->orWhere('jabatan', 'like', $search);
		}
		return view('livewire.users.index', [
			'users' => $this->users->paginate($this->limit)->onEachSide(2),
		]);
	}

	public function updatingLimit()
	{
		$this->resetPage();
	}

	public function updatingSearch()
	{
		$this->resetPage();
	}

	public function changeRole(User $user)
	{
		if ($user->role == 'staff') {
			$user->role = 'user';
		} elseif ($user->role == 'user') {
			$user->role = 'staff';
		} else {
			return false;
		}

		$user->save();
		session()->flash('success', $user->role == 'staff' ? $user->name . ' telah diubah menjadi Staff.' : $user->name . ' telah diubah menjadi User.');
		$this->resetPage();
	}

	public function delete(User $user)
	{
		$name = $user->name;
		$user->delete();

		session()->flash('success', $name.' telah berhasil dihapus.');
	}

	public function detail(User $user)
	{
		$this->user_nik = $user->nik;
		$this->user_name = $user->name;
		$this->user_divisi = $user->divisi;
		$this->user_jabatan = $user->jabatan;
		$this->user_lokasi = $user->lokasi;
		$this->user_telepon = $user->telepon;
		$this->user_email = $user->email;
		$this->user_role = $user->role;

		$this->openModal();
	}

	public function openModal()
	{
		$this->isOpen = true;
	}

	public function closeModal()
	{
		$this->isOpen = false;
		$this->resetModal();
	}

	public function resetModal()
	{
		$this->user_nik = '';
		$this->user_name = '';
		$this->user_divisi = '';
		$this->user_jabatan = '';
		$this->user_lokasi = '';
		$this->user_telepon = '';
		$this->user_email = '';
		$this->user_role = '';
	}
}
