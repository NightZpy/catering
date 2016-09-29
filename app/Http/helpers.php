<?php
	function getRollBarUser() {
	    if (\Auth::check()) {
	        $user = \Auth::user();
	        return array(
	            'id' => $user->id, // required - value is a string
	            'username' => $user->name, // required - value is a string
	            'email' => $user->email, // optional - value is a string
	        );
	    }
	    return ['username' => 'Guest'];
	}