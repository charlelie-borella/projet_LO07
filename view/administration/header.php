<?php

function headerSite($title){
	$html=<<<html
		<!DOCTYPE html>
		<html lang="fr">
		  <head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <link href='../design/css/bootstrap.min.css' rel='stylesheet'>
		    <link href='../design/css/design.css'rel='stylesheet'>		    
		  </head>
		  <body>
		   <div id="page">
html;
	return $html;
}

