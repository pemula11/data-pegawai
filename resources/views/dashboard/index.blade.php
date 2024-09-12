@extends('dashboard.layouts.main')
@section('title', 'dashboard')
@section('content')

<h2 class="font-weight-bolder mb-0">General Statistics</h2>
<div class="row py-4">
    <div class="col-lg-5 col-sm-5  ">
      <div class="card  mb-2">
<div class="card-header p-3 pt-2">
  <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
    <i class="material-icons opacity-10">weekend</i>
  </div>
  <div class="text-end pt-1">
    <p class="text-sm mb-0 text-capitalize">Golongan</p>
    <h4 class="mb-0">{{$totalGolongan}}</h4>
  </div>
</div>

</div>

      <div class="card  mb-2">
<div class="card-header p-3 pt-2">
  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
    <i class="material-icons opacity-10">leaderboard</i>
  </div>
  <div class="text-end pt-1">
    <p class="text-sm mb-0 text-capitalize">Pegawai</p>
    <h4 class="mb-0">{{$totalPegawai}}</h4>
  </div>
</div>

</div>

    </div>
    <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
      <div class="card  mb-2">
<div class="card-header p-3 pt-2 bg-transparent">
  <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
    <i class="material-icons opacity-10">calendar_month</i>
  </div>
  <div class="text-end pt-1">
    <p class="text-sm mb-0 text-capitalize ">Tanggal</p>
    <h4 class="mb-0 ">{{ date('Y-m-d') }}</h4>
  </div>
</div>

</div>

      <div class="card ">
<div class="card-header p-3 pt-2 bg-transparent">
  <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
    <i class="material-icons opacity-10">person_add</i>
  </div>
  <div class="text-end pt-1">
    <p class="text-sm mb-0 text-capitalize ">New Data</p>
    <h4 class="mb-0 ">+00</h4>
  </div>
</div>

<hr class="horizontal my-0 dark">

</div>

    </div>
  </div>

@endsection