@extends('layouts.app_admin')

@section('title', 'Data Anak')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    @media (min-width: 768px) {
        .btn {
            margin-top: 10px;
        }
    }
</style>
@livewireStyles
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Data</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('$message'))
                    <div class="alert alert-success">
                        {{ session('$message') }}
                    </div>
                    @endif
                    @livewire('bidan.anak.index')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@livewireScripts

<script type="text/javascript">
    window.livewire.on('userStore', () => {
        $('#exampleModal').modal('hide');
    });

    window.livewire.on('userUpdate', () => {
        $('#updateModal').modal('hide');
    });
</script>

@endsection