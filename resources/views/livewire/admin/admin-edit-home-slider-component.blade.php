<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add NewSlider
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">All Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message')) 
                           <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlider">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Title</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="title" class="form-control input-md" placeholder="Title"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="subtitle" class="form-control input-md" placeholder="Subtitle"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="price" class="form-control input-md" placeholder="Price"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="link" class="form-control input-md" placeholder="Link"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image"/>
                                    @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" width="120" alt="">
                                    @else
                                    <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="120" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>                                
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>                                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
