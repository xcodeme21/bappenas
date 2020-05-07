<!DOCTYPE html>
<html dir="ltr" lang="en">

@include("backend.include.head")

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">
        @include("backend.include.sidebar")
        
        <div class="page-wrapper">
        
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Tambah User</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="index.html">Masterisasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="page-content container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                {{ Form::open(['route' => 'add-user', 'method' => 'post','class'=>'form-horizontal','id'=>'form', 'enctype'=>'multipart/form-data']) }}
                                {{ Form::token() }}
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama User</label>
                                        <div class="col-sm-9">
                                        {{ Form::text('nama', null, [ 'class'=>'form-control input-sm form-control-line', 'id'=>'', 'placeholder'=>'Masukkan nama user...', 'required']) }} 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                        {{ Form::email('email', null, [ 'class'=>'form-control input-sm form-control-line', 'id'=>'', 'placeholder'=>'Masukkan email...', 'required']) }} 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">NIP</label>
                                        <div class="col-sm-9">
                                        {{ Form::text('nip', null, [ 'class'=>'form-control input-sm form-control-line', 'id'=>'', 'placeholder'=>'Masukkan nip...', 'required']) }} 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">No. HP</label>
                                        <div class="col-sm-9">
                                        {{ Form::number('no_hp', null, [ 'class'=>'form-control input-sm form-control-line', 'id'=>'', 'placeholder'=>'Masukkan nomor hp...', 'required']) }} 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                        {{ Form::textarea('alamat', null, [ 'class'=>'form-control input-sm form-control-line', 'rows'=>'5', 'placeholder'=>'Masukkan alamat...', 'required']) }} 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Level</label>
                                        <div class="col-sm-9">
                                            <select class="form-control input-sm form-control-line" name="id_level" required>
                                                <option value="">-- Pilih Level --</option>
                                                @foreach(@$level as $lv)
                                                <option value="{{ @$lv->id }}">{{ @$lv->level }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control input-sm form-control-line" placeholder="Masukkan password..." required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Ulangi Password</label>
                                        <div class="col-sm-9">
                                        <input type="password" name="ulangi_password" class="form-control input-sm form-control-line" placeholder="Ulangi password..." required />
                                        </div>
                                    </div>
                                    <div class="form-group row-fluid" align="center">
                                        <a href="{{ route('user') }}" class="btn btn-info btn-sm"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                                        <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save fa-fw"></i> Simpan</button>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
            @include("backend.include.footer")
        </div>
    </div>
    <div class="chat-windows"></div>
    
    @include("backend.include.script")

    </body>
</html>