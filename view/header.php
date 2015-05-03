<?php

function headerSite($title){
	$html=<<<html
		<!DOCTYPE html>
		<html lang="fr">
		  <head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <link href='/content/css/bootstrap.min.css' rel='stylesheet'>
		    <link href='/content/css/design.css'rel='stylesheet'>		    
		  </head>
		  <body>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		  <script src="content/js/bootstrap.min.js"></script>
		   <div id="page">
html;
	return $html;
}

