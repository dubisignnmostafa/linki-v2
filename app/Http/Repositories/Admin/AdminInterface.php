<?php

namespace App\Http\Repositories\Admin;

interface AdminInterface
{

    public function findById($id);
	public function create($request);
	public function update($request);
	public function adminUpdate($request,$id);
	public function resetPassword($request);
	public function confirmPassword($request);
};
