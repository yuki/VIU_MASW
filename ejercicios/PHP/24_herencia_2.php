<?php

class Blog {
	public function showPost() {
		$args = func_get_args[];

		if(count($args) == 0) {
			return "No existen posts";
		} else {
			return "Post: " . $args[0];
		}
	}
}



?>