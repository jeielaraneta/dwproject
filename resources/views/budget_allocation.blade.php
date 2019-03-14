@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Budget Allocation</div>

                <budget_allocation-component></budget_allocation-component>
                
            </div>
        </div>
    </div>
</div>
@endsection
