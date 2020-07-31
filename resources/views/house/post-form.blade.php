@extends('layout/master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Đăng bài cho thuê nhà</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form >
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Type:</label>
                        <input type="text" name="type" class="form-control">

                    </div>

                    <div class="form-group">
                        <label>Rooms:</label>
                        <input type="text" name="rooms" class="form-control">

                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" name="price" class="form-control">

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Đăng bài</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

