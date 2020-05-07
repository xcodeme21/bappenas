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
                        <h5 class="font-medium text-uppercase mb-0">Data User</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="#">Masterisasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="page-content container-fluid">
            @include('flash::message')
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row-fluid" align="right">
                                    <a href="{{ route('tambah-user') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                                    <a href="{{ route('user') }}" class="btn btn-info btn-sm"><i class="fa fa-spinner fa-spin"></i> Refresh</a>
                                </div>
                                <hr>
                                <div class="table-responsive animated bounceInUp">
                                    <table class="table table-striped border display datatable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>      
                                                <th>Nama</th>    
                                                <th>Email</th>
                                                <th>NIP</th> 
                                                <th>No. HP</th> 
                                                <th>Alamat</th> 
                                                <th>Level</th> 
                                                <th>Aksi</th> 
                                            </tr>
                                        </thead>
                                        <tbody>  
                                            <?php $no=0; ?>
                                            @foreach(@$user as $rs)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ @$no }}</td>
                                                <td>{{ @$rs->nama }}</td>
                                                <td>{{ @$rs->email }}</td>
                                                <td>{{ @$rs->nip }}</td>
                                                <td>{{ @$rs->no_hp }}</td>
                                                <td>{{ @$rs->alamat }}</td>
                                                <td>@if(@$rs->id_level == 1)<i class="fa fa-key fa-fw"></i>@endif{{ @$rs->level }}</td>
                                                <td>
                                                    @if(@$rs->id_level == 1)
                                                    <button class="btn btn-primary btn-sm btn-block" disabled><i class="fa fa-ban fa-fw"></i> Not Allowed</button>
                                                    @else
                                                    <a href="{{ route('edit-user',@$rs->id) }}" class="btn btn-info btn-sm btn-block"><i class="fa fa-edit fa-fw"></i> Edit</a>
                                                    <a href="{{ route('hapus-user',@$rs->id) }}" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash fa-fw"></i> Hapus</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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