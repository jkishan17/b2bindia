@extends('jpanel.layouts.app')
@section('title')
    Add New Vendor
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Vendor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.users') }}">View Vendor</a></li>
                        <li class="breadcrumb-item active">Add Vendor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row flash-message">
                <div class="col-12">
                    @include('jpanel/flash-message')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <!-- Profile Update box -->
                    <form action="{{ route('add.vendor') }}" method="post">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">New Vendor Add Form</h3>
                                <div class="card-tools">
                                    <a href="{{ route('list.vendors') }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye"></i> View All Vendor
                                    </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <h5 for="name">Vendor Personal Details</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Full Name</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('vendorName') is-invalid @enderror"
                                            id="uname" name="vendorName" placeholder="Enter Name" value={{ old('vendorName') }}>
                                        @if ($errors->has('vendorName'))
                                            <div class="text-danger">{{ $errors->first('vendorName') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name">User Name</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('username') is-invalid @enderror"
                                            id="username" name="username" placeholder="Enter User Name" value={{ old('username') }}>
                                        @if ($errors->has('username'))
                                            <div class="text-danger">{{ $errors->first('username') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Password</label>
                                        <input type="password"
                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Enter Password" value={{ old('password') }}>
                                        @if ($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5 for="name">Vendor Company Details</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Company Name</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('company_name') is-invalid @enderror"
                                            id="company_name" name="company_name" placeholder="Enter Comany Name" value={{ old('company_name') }}>
                                        @if ($errors->has('company_name'))
                                            <div class="text-danger">{{ $errors->first('company_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Phone</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" placeholder="Enter Phone Number" value={{ old('phone') }}>
                                        @if ($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email"
                                            class="form-control form-control-sm @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Enter email" value={{ old('email') }}>
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Country</label>
                                        <select
                                            class="form-control form-control-sm select2 @error('country') is-invalid @enderror"
                                            name="country" value={{ old('country') }}>
                                            <option value="">Select Country</option>
                                            <option value="India" @if (old('country') == "India") {{ 'selected' }} @endif>India</option>
                                        </select>
                                        @if ($errors->has('country'))
                                            <div class="text-danger">{{ $errors->first('country') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <select
                                            class="form-control form-control-sm select2 @error('state') is-invalid @enderror"
                                            name="state">
                                            <option value="">Select State</option>
                                            <option value="AN" @if (old('state') == "AN") {{ 'selected' }} @endif>Andaman and Nicobar Islands</option>
                                            <option value="AP" @if (old('state') == "AP") {{ 'selected' }} @endif>Andhra Pradesh</option>
                                            <option value="AR" @if (old('state') == "AR") {{ 'selected' }} @endif>Arunachal Pradesh</option>
                                            <option value="AS" @if (old('state') == "AS") {{ 'selected' }} @endif>Assam</option>
                                            <option value="BR" @if (old('state') == "BR") {{ 'selected' }} @endif>Bihar</option>
                                            <option value="CH" @if (old('state') == "CH") {{ 'selected' }} @endif>Chandigarh</option>
                                            <option value="CT" @if (old('state') == "CT") {{ 'selected' }} @endif>Chhattisgarh</option>
                                            <option value="DN" @if (old('state') == "DN") {{ 'selected' }} @endif>Dadra and Nagar Haveli</option>
                                            <option value="DD" @if (old('state') == "DD") {{ 'selected' }} @endif>Daman and Diu</option>
                                            <option value="DL" @if (old('state') == "DL") {{ 'selected' }} @endif>Delhi</option>
                                            <option value="GA" @if (old('state') == "GA") {{ 'selected' }} @endif>Goa</option>
                                            <option value="GJ" @if (old('state') == "GJ") {{ 'selected' }} @endif>Gujarat</option>
                                            <option value="HR" @if (old('state') == "HR") {{ 'selected' }} @endif>Haryana</option>
                                            <option value="HP" @if (old('state') == "HP") {{ 'selected' }} @endif>Himachal Pradesh</option>
                                            <option value="JK" @if (old('state') == "JK") {{ 'selected' }} @endif>Jammu and Kashmir</option>
                                            <option value="JH" @if (old('state') == "JH") {{ 'selected' }} @endif>Jharkhand</option>
                                            <option value="KA" @if (old('state') == "KA") {{ 'selected' }} @endif>Karnataka</option>
                                            <option value="KL" @if (old('state') == "KL") {{ 'selected' }} @endif>Kerala</option>
                                            <option value="LA" @if (old('state') == "LA") {{ 'selected' }} @endif>Ladakh</option>
                                            <option value="LD" @if (old('state') == "LD") {{ 'selected' }} @endif>Lakshadweep</option>
                                            <option value="MP" @if (old('state') == "MP") {{ 'selected' }} @endif>Madhya Pradesh</option>
                                            <option value="MH" @if (old('state') == "MH") {{ 'selected' }} @endif>Maharashtra</option>
                                            <option value="MN" @if (old('state') == "MN") {{ 'selected' }} @endif>Manipur</option>
                                            <option value="ML" @if (old('state') == "ML") {{ 'selected' }} @endif>Meghalaya</option>
                                            <option value="MZ" @if (old('state') == "MZ") {{ 'selected' }} @endif>Mizoram</option>
                                            <option value="NL" @if (old('state') == "NL") {{ 'selected' }} @endif>Nagaland</option>
                                            <option value="OR" @if (old('state') == "OR") {{ 'selected' }} @endif>Odisha</option>
                                            <option value="PY" @if (old('state') == "PY") {{ 'selected' }} @endif>Puducherry</option>
                                            <option value="PB" @if (old('state') == "PB") {{ 'selected' }} @endif>Punjab</option>
                                            <option value="RJ" @if (old('state') == "RJ") {{ 'selected' }} @endif>Rajasthan</option>
                                            <option value="SK" @if (old('state') == "SK") {{ 'selected' }} @endif>Sikkim</option>
                                            <option value="TN" @if (old('state') == "TN") {{ 'selected' }} @endif>Tamil Nadu</option>
                                            <option value="TG" @if (old('state') == "TG") {{ 'selected' }} @endif>Telangana</option>
                                            <option value="TR" @if (old('state') == "TR") {{ 'selected' }} @endif>Tripura</option>
                                            <option value="UP" @if (old('state') == "UP") {{ 'selected' }} @endif>Uttar Pradesh</option>
                                            <option value="UT" @if (old('state') == "UT") {{ 'selected' }} @endif>Uttarakhand</option>
                                            <option value="WB" @if (old('state') == "WB") {{ 'selected' }} @endif>West Bengal</option>
                                        </select>
                                        @if ($errors->has('state'))
                                            <div class="text-danger">{{ $errors->first('state') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="city">City</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('city') is-invalid @enderror"
                                            id="city" name="city" placeholder="Enter City Name" value={{ old('city') }}>
                                        @if ($errors->has('city'))
                                            <div class="text-danger">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Address 1</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('address1') is-invalid @enderror"
                                            id="address1" name="address1" placeholder="Enter Address" value={{ old('address1') }}>
                                        @if ($errors->has('address1'))
                                            <div class="text-danger">{{ $errors->first('address1') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="country">Address 2</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('address2') is-invalid @enderror"
                                            id="address2" name="address2" placeholder="Enter Address" value={{ old('address2') }}>
                                        @if ($errors->has('address2'))
                                            <div class="text-danger">{{ $errors->first('address2') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="country">Zipcode</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('zipcode') is-invalid @enderror"
                                            id="zipcode" name="zipcode" placeholder="Enter Zip Code" value={{ old('zipcode') }}>
                                        @if ($errors->has('zipcode'))
                                            <div class="text-danger">{{ $errors->first('zipcode') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Pan No</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('panNo') is-invalid @enderror"
                                            id="panNo" name="panNo" placeholder="Enter Pan Number" value={{ old('panNo') }}>
                                        @if ($errors->has('panNo'))
                                            <div class="text-danger">{{ $errors->first('panNo') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="country">GST No</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('gstNo') is-invalid @enderror"
                                            id="gstNo" name="gstNo" placeholder="Enter GST Number" value={{ old('gstNo') }}>
                                        @if ($errors->has('gstNo'))
                                            <div class="text-danger">{{ $errors->first('gstNo') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="country">Website Link</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('websiteLink') is-invalid @enderror"
                                            id="websiteLink" name="websiteLink" placeholder="Enter Website Link" value={{ old('websiteLink') }}>
                                        @if ($errors->has('websiteLink'))
                                            <div class="text-danger">{{ $errors->first('websiteLink') }}</div>
                                        @endif
                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary btn-block">Submit <i
                                        class="fas fa-angle-double-right"></i></button>
                            </div>
                            <!-- /.card-footer-->

                        </div>
                        <!-- /.card -->
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    @include('jpanel.vendor.ajax')
@endsection
