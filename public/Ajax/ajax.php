<?php
session_start();

$id = (int) $_GET['id'];
$quantity = (int) $_GET['quantity'];

$_SESSION['cart'][$id] = $quantity;
