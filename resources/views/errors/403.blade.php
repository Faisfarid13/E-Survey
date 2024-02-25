@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', Akses Ditolak)
@section('advice', _('Mohon maaf, halaman yang Anda coba akses tidak tersedia untuk akses umum. Jika Anda merasa ini adalah kesalahan, silakan hubungi administrator.'))
