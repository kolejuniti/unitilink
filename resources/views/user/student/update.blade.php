@extends('layouts.user')

@section('main')

<style>
  .form-control,
  .form-select {
      border: 1px solid black;
      padding: 5px;
  }
  </style>
  
<!-- Content Header (Page header) -->
<div class="content-wrapper" style="min-height: 695.8px;">
  <div class="container-full">
  <!-- Content Header (Page header) -->	  
  <div class="content-header">
    <div class="d-flex align-items-center">
      <div class="me-auto">
        <h4 class="page-title">Edit</h4>
        <div class="d-inline-block align-items-center">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
              <li class="breadcrumb-item" aria-current="page">Student</li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Student Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/user/edit/update?id={{ $student->ic }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="card mb-3">
                    <div class="card-header">
                      <b>Maklumat Peribadi</b>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-label" for="name">Full Name <p style="color:red; display:inline-block;">*</p></label>
                            <input style="text-transform:uppercase" type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $student->name }}" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="ic">IC <p style="color:red; display:inline-block;">*</p></label>
                            <input type="text" class="form-control" id="ic" name="ic" placeholder="Enter ic" value="{{ (strlen($student->ic) == 12) ? $student->ic : '' }}" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="passport">No. Passport <p style="color:red; display:inline-block;">*</p></label>
                            <input type="text" class="form-control" id="passport" name="passport" placeholder="Enter passport" value="{{ (strlen($student->ic) != 12) ? $student->ic : '' }}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="birth_place">Place Of Birth <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="birth_place" name="birth_place">
                              <option value="-" selected disabled>-</option>
                                @foreach ($data['state'] as $state)
                                <option value="{{ $state->id }}" {{ ($student->place_birth == $state->id) ? 'selected' : '' }}>{{ $state->state_name}}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="birth_date">Date Of Birth <p style="color:red; display:inline-block;">*</p></label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $student->date_birth }}" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="gender">Gender <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="gender" name="gender">
                              <option value="-" selected disabled>-</option>
                                @foreach ($data['gender'] as $gender)
                                <option value="{{ $gender->id }}" {{ ($student->sex_id == $gender->id) ? 'selected' : '' }}>{{ $gender->sex_name}}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      {{-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <h4 style="color:red; display:inline-block;"><a target="_blank" href="https://mysprsemak.spr.gov.my/semakan">Untuk semak student di MYSPR, boleh click di sini.</a></h4>
                          </div>
                        </div>
                      </div> --}}
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="race">Race <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="race" name="race">
                              <option value="-" selected disabled>-</option>
                                @foreach ($data['race'] as $ny)
                                <option value="{{ $ny->id }}" {{ ($student->nationality_id == $ny->id) ? 'selected' : '' }}>{{ $ny->nationality_name }}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="religion">Religion <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="religion" name="religion">
                              <option value="-" selected disabled>-</option>
                                @foreach ($data['religion'] as $religion)
                                <option value="{{ $religion->id }}" {{ ($student->religion_id == $religion->id) ? 'selected' : '' }}>{{ $religion->religion_name }}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="CL">Citizenship Level <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="CL" name="CL">
                              <option value="-" selected disabled>-</option>
                                @foreach ($data['CL'] as $CL)
                                <option value="{{ $CL->id }}" {{ ($student->statelevel_id == $CL->id) ? 'selected' : '' }}>{{ $CL->citizenshiplevel_name}}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="citizen">Citizen <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="citizen" name="citizen">
                              <option value="-" selected disabled>-</option>
                                @foreach ($data['citizen'] as $ct)
                                <option value="{{ $ct->id }}" {{ ($student->citizenship_id == $ct->id) ? 'selected' : '' }}>{{ $ct->citizenship_name}}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="mstatus">Status <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="mstatus" name="mstatus">
                              <option value="-" selected disabled>-</option>
                                @foreach ($data['mstatus'] as $mstatus)
                                <option value="{{ $mstatus->id }}" {{ ($student->marriage_id == $mstatus->id) ? 'selected' : '' }}>{{ $mstatus->marriage_name}}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="np1">No. Phone 1 <p style="color:red; display:inline-block;">*</p></label>
                            <input type="text" class="form-control" id="np1" placeholder="Enter Phone Number 1" name="np1" value="{{ $student->no_tel }}" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="np2">No. Phone 2</label>
                            <input type="text" class="form-control" id="np2" placeholder="Enter Phone Number 2" name="np2" value="{{ $student->no_tel2 }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="np3">Home Phone Np.</label>
                            <input type="text" class="form-control" id="np3" placeholder="Enter Home Phone Number" name="np3" value="{{ $student->no_telhome }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="qualification">Qualification <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="qualification" name="qualification" required>
                              <option value="-" selected disabled>-</option>
                                @foreach ($data['qualification'] as $quality)
                                <option value="{{ $quality->id }}" {{ ($student->qualification == $quality->id) ? 'selected' : '' }}>{{ $quality->name }}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6 mt-3" id="commentID2" hidden>
                          <div class="form-group">
                            <label class="form-label" for="comment">Description</label>
                            <input type="text" class="form-control" id="comment" placeholder="Enter Description" name="comment" value="{{ $student->description }}">
                          </div>   
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="matric">No. Matric</label>
                            <input type="text" class="form-control" id="matric" name="matric" placeholder="Enter matric" required value="{{ $student->no_matric }}" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $student->email }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mt-4">
                          <div class="form-group">
                              <input type="checkbox" id="oku" class="filled-in" name="oku" value="1" {{ ($student->oku != null) ? 'checked'  : '' }}>
                              <label for="oku">OKU</label>
                          </div>
                        </div>
                        <div class="col-md-6 mb-2">
                          <div class="form-group">
                            <label class="form-label" for="jkm">JKM</label>
                            <input type="text" class="form-control" id="jkm" name="jkm" value="{{ $student->no_jkm }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="dt">Date/Time</label>
                            <input type="datetime-local" class="form-control" id="dt" name="dt" value="{{ $student->datetime }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3">
                    <div class="card-header">
                      <b>Permanent Address</b>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="address1">Address 1 <p style="color:red; display:inline-block;">*</p></label>
                            <input type="text" class="form-control" id="address1" placeholder="Enter Address 1" name="address1" value="{{ $student->address1 }}" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="address2">Address 2</label>
                            <input type="text" class="form-control" id="address2" placeholder="Enter Address 2" name="address2" value="{{ $student->address2 }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="address3">Address 3</label>
                            <input type="text" class="form-control" id="address3" placeholder="Enter Address 3" name="address3" value="{{ $student->address3 }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="postcode">Postcode <p style="color:red; display:inline-block;">*</p></label>
                            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Enter Postcode" value="{{ $student->postcode }}" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="city">City <p style="color:red; display:inline-block;">*</p></label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{ $student->city }}" required>
                          </div>
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="state">State</label>
                            <select class="form-select" id="state" name="state">
                              <option value="-" selected disabled>-</option>
                              @foreach ($data['state'] as $state)
                              <option value="{{ $state->id }}" {{ ($student->state_id == $state->id) ? 'selected' : '' }}>{{ $state->state_name}}</option> 
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="country">Country</label>
                            <select class="form-select" id="country" name="country">
                              <option value="-" selected disabled>-</option>
                              @foreach ($data['country'] as $cry)
                                <option value="{{ $cry->id }}" {{ ($student->country_id == $cry->id) ? 'selected' : '' }}>{{$cry->name }}</option> 
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id="forms-container">
                    <div class="card mb-3" id="card-1">
                      <div class="card-header">
                        <b>Heir (Waris)</b>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="w_name">Name <p style="color:red; display:inline-block;">*</p></label>
                              <input type="text" class="form-control" id="w_name" placeholder="Enter Name" name="w_name[]">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="w_ic">IC <p style="color:red; display:inline-block;">*</p></label>
                              <input type="text" class="form-control" id="w_ic" placeholder="Enter IC" name="w_ic[]">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="w_notel_home">Home No. Tel</label>
                              <input type="text" class="form-control" id="w_notel_home" placeholder="Enter No. Tel Home" name="w_notel_home[]">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="w_notel">Phone No. Tel <p style="color:red; display:inline-block;">*</p></label>
                              <input type="text" class="form-control" id="w_notel" placeholder="Enter No. Tel" name="w_notel[]">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="occupation">Occupation <p style="color:red; display:inline-block;">*</p></label>
                              <select class="form-select" id="occupation" name="occupation[]">
                                <option value="-" selected disabled>-</option>
                                <option value="SEKTOR KERAJAAN">SEKTOR KERAJAAN</option>
                                <option value="SEKTOR SWASTA">SEKTOR SWASTA</option>
                                <option value="BEKERJA SENDIRI">BEKERJA SENDIRI</option>
                                <option value="PESARA">PESARA</option>
                                <option value="TIDAK BEKERJA">TIDAK BEKERJA</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="dependent">No. Dependent <p style="color:red; display:inline-block;">*</p></label>
                              <input type="text" class="form-control" id="dependent" name="dependent[]" placeholder="Enter Dependent">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="relationship">Relationship <p style="color:red; display:inline-block;">*</p></label>
                              <select class="form-select" id="relationship" name="relationship[]">
                                <option value="-" selected disabled>-</option>
                                @foreach ($data['relationship'] as $rlp)
                                  <option value="{{ $rlp->id }}">{{$rlp->name }}</option> 
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="w_race">Race <p style="color:red; display:inline-block;">*</p></label>
                              <select class="form-select" id="w_race" name="w_race[]">
                                <option value="-" selected disabled>-</option>
                                @foreach ($data['race'] as $rc)
                                  <option value="{{ $rc->id }}">{{ $rc->nationality_name }}</option> 
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="w_kasar">Salary (Kasar) <p style="color:red; display:inline-block;">*</p></label>
                              <input type="text" class="form-control" id="w_kasar" name="w_kasar[]">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="w_bersih">Salary (Bersih)</label>
                              <input type="text" class="form-control" id="w_bersih" name="w_bersih[]">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="w_status">Status <p style="color:red; display:inline-block;">*</p></label>
                              <select class="form-select" id="w_status" name="w_status[]">
                                <option value="-" selected disabled>-</option>
                                @foreach ($data['wstatus'] as $sts)
                                  <option value="{{ $sts->id }}">{{$sts->name }}</option> 
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group">
                      <button id="add-form" class="btn btn-primary pull-right" type="button">Add Waris</button>
                    </div>
                  </div>

                  <div class="card mb-3">
                    <div class="card-header">
                      <b>Program Registration</b> <a href="{{ asset('storage/requirement/SENARAI PROGRAM DENGAN SYARAT KELAYAKAN SKM _SVM.xls') }}"><h3>Requirement</h3></a>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-label" for="program">Program <p style="color:red; display:inline-block;">*</p></label>
                            <select class="form-select" id="program" name="program" required>
                              <option value="-" selected disabled>-</option>
                                @foreach ($program as $prg)
                                <option value="{{ $prg->id }}" {{ ($prg->id == $student->program) ? 'selected' : ''}}>{{ $prg->progcode }} - {{$prg->progname }}</option> 
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12 mt-3" id="commentID" hidden>
                          <div class="form-group">
                              <label class="form-label">Comment</label>
                              <textarea id="commenttxt" name="comment" class="mt-2" rows="10" cols="80">
                              </textarea>
                              <span class="text-danger">@error('comment')
                                {{ $message }}
                              @enderror</span>
                          </div>   
                        </div>
                      </div>
                    </div>
                  </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="row pull-right">
                    <div class="d-flex ">
                      {{-- <div class="form-group" style="margin-right: 5px">
                        <a class="btn btn-info mb-3" type="button" href="/pendaftar/surat_tawaran?ic={{ $student->ic }}" target="_blank">Surat Tawaran</a>
                      </div> --}}
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
<script src="{{ asset('assets/assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script src="{{ asset('assets/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Fill the input fields in the original card element with the first row of data
  var firstWaris = {!! json_encode($data['waris']->shift()) !!};
  $('#w_name').val(firstWaris.name);
  $('#w_ic').val(firstWaris.ic);
  $('#w_notel_home').val(firstWaris.home_tel);
  $('#w_notel').val(firstWaris.phone_tel);
  $('#occupation').val(firstWaris.occupation);
  $('#dependent').val(firstWaris.dependent_no);
  $('#relationship').val(firstWaris.relationship);
  $('#w_race').val(firstWaris.race);
  $('#w_kasar').val(firstWaris.kasar);
  $('#w_bersih').val(firstWaris.bersih);
  $('#w_status').val(firstWaris.status);

  // Clone the card element with ID #card-1 for each remaining row of data
  @foreach ($data['waris'] as $waris)
    var newForm = $('#card-1').clone();
    newForm.attr('id', 'card-{{ $waris->id }}');
    newForm.find('input[name="w_name[]"]').val('{{ $waris->name }}');
    newForm.find('input[name="w_ic[]"]').val('{{ $waris->ic }}');
    newForm.find('input[name="w_notel_home[]"]').val('{{ $waris->home_tel }}');
    newForm.find('input[name="w_notel[]"]').val('{{ $waris->phone_tel }}');
    newForm.find('select[name="occupation[]"]').val('{{ $waris->occupation }}');
    newForm.find('input[name="dependent[]"]').val('{{ $waris->dependent_no }}');
    newForm.find('input[name="w_kasar[]"]').val('{{ $waris->kasar }}');
    newForm.find('input[name="w_bersih[]"]').val('{{ $waris->bersih }}');
    newForm.find('select[name="relationship[]"]').val('{{ $waris->relationship }}');
    newForm.find('select[name="w_race[]"]').val('{{ $waris->race }}');
    newForm.find('select[name="w_status[]"]').val('{{ $waris->status }}');
    // Add a delete button to the card element
    var editButton = $('<div class="form-group" style="margin-left: 10px"><button class="btn btn-danger delete-form" type="button">Delete Form</button></div>');
    newForm.append(editButton);
    // Add the new card element to the forms container
    $('#forms-container').append(newForm);
  @endforeach

  // Attach a click event listener to the delete buttons
  $('#forms-container').on('click', '.delete-form', function() {
    // Remove the parent card element
    $(this).closest('.card').remove();
  });
});

$(document).ready(function() {
    $('#add-form').click(function() {
      // Clone the card element with ID #card-1
      var newForm = $('#card-1').clone();
      // Clear the input values in the cloned form
      newForm.find('input, select').val('');
      // Add a delete button to the new form
      newForm.append('<div class="form-group" style="margin-left: 10px"><button class="btn btn-danger delete-form" type="button">Delete Form</button></div>');
      // Append the new form to the forms container
      $('#forms-container').append(newForm);
    });

    // Attach a click event listener to the delete buttons
    $('#forms-container').on('click', '.delete-form', function() {
      // Remove the parent card element
      $(this).closest('.card').remove();
    });

    if($("#CF").is(":checked"))
    {
      document.getElementById('missingform').hidden = true;
        $('#copyic').prop('checked', false);
        $('#copybc').prop('checked', false);
        $('#copyspm').prop('checked', false);
        $('#coppysc').prop('checked', false);
        $('#copypic').prop('checked', false);
        $('#copypp').prop('checked', false);
    }else{
      document.getElementById('missingform').hidden = false;
    }
  });

  $(document).ready(function() {

    let arr = [3,4,5,6];

    // Convert the value to a number for comparison
    let selectedValue = parseInt($('#qualification').val(), 10);

    if(arr.includes(selectedValue))
    {

      document.getElementById('commentID2').hidden = false;
      document.getElementById('comment').required = true;
      document.getElementById('comment').disabled = false;

    }else{

      document.getElementById('commentID2').hidden = true;
      document.getElementById('comment').required = false;
      document.getElementById('comment').disabled = true;

    }

  })
</script>

<script type="text/javascript">

"use strict";
ClassicEditor
.create( document.querySelector( '#commenttxt' ),{ height: '25em' } )
.then(newEditor =>{editor = newEditor;})
.catch( error => { console.log( error );});

$(document).on('change', "#CF",function(){
  if(this.checked)
  {
    document.getElementById('missingform').hidden = true;
      $('#copyic').prop('checked', false);
      $('#copybc').prop('checked', false);
      $('#copyspm').prop('checked', false);
      $('#coppysc').prop('checked', false);
      $('#copypic').prop('checked', false);
      $('#copypp').prop('checked', false);
  }else{
    document.getElementById('missingform').hidden = false;
  }
    //
})

$(document).on('change', '#program', function(){

  document.getElementById('commentID').hidden = false;

  document.getElementById('commenttxt').required = true;

})

$(document).on('change', '#qualification', function(){

let arr = [3,4,5,6];

// Convert the value to a number for comparison
let selectedValue = parseInt($(this).val(), 10);

if(arr.includes(selectedValue))
{

  document.getElementById('commentID2').hidden = false;
  document.getElementById('comment').required = true;
  document.getElementById('comment').disabled = false;

}else{

  document.getElementById('commentID2').hidden = true;
  document.getElementById('comment').required = false;
  document.getElementById('comment').disabled = true;

}

})
</script>
@endsection
