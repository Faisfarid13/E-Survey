@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Terjadi kesalahan pada server'))
@section('advice', _('Maaf, terjadi kesalahan pada server saat memproses permintaan Anda. Tim kami sedang bekerja untuk memperbaikinya. Mohon coba lagi nanti.'))