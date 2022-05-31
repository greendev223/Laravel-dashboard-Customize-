<!-- 
    {{ Form::open(array('route' => array('vendors.import'),'method'=>'post', 'enctype' => "multipart/form-data")) }}
    <div class="modal-body">
    <div class="row">
        <div class="col-md-12 mb-2 d-flex align-items-center justify-content-between">
            {{Form::label('file',__('Download sample vendor CSV file'),['class'=>'col-form-label w-100'])}}
            <a href="{{asset(Storage::url('uploads/sample')).'/sample-vendor.csv'}}" class="btn btn-xs btn-white btn-icon-only w-50">
                <i class="fa fa-download"></i> {{__('Download')}}
            </a>
        </div>
        <div class="col-md-12">
            {{Form::label('file',__('Select CSV File'),['class'=>'col-form-label'])}}
            <div class="choose-file form-group">
                <label for="file" class="col-form-label w-100">
                    <div>{{__('Choose file here')}}</div>
                    <input type="file" class="form-control h-auto" name="file" id="file" data-filename="upload_file" required>
                </label>
                <p class="upload_file"></p>
            </div>
        </div>
    </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
        <input class="btn btn-primary" type="submit" value="{{ __('Upload') }}">
    </div>
    </div>
    {{ Form::close() }} -->




<div class="modal-body">
    {{ Form::open(array('route' => array('vendors.import'),'method'=>'post', 'enctype' => "multipart/form-data")) }}
    <div class="row">

        <div class="col-md-12 mb-6">
            {{Form::label('file',__('Download sample vendor CSV file'),['class'=>'col-form-label'])}}
                <a href="{{asset(Storage::url('uploads/sample')).'/sample-vendor.csv'}}" class="btn btn-sm btn-primary btn-icon">
                    <i class="fa fa-download"></i>
                </a>
        </div>
        <div class="col-md-12">
            {{Form::label('file',__('Select CSV File'),['class'=>'form-control-label'])}}
            <div class="choose-file form-group">
                <label for="file" class="col-form-label">
                    <div>{{__('Choose file here')}}</div>
                    <input type="file" class="form-control" name="file" id="file" data-filename="upload_file" required>
                </label>
                <p class="upload_file"></p>
            </div>
        </div>
    </div>            
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{__('Cancel')}}</button>
    <button type="submit" class="btn  btn-primary">{{__('Update')}}</button>
</div>

{{ Form::close() }}