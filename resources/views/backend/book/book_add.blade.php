@extends('admin.admin_master')
@section('admin')
<div class="container-full">  
    <!-- Main content -->
    <section class="content">
     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Add Book</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form novalidate>
                  <div class="row">
                    <div class="col-12">	

                        <div class="row">    

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Category Select<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <select name="category_id" class="form-control"  >
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>	
                                            @endforeach
                                        </select>
                                        @error('category_id') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror 
                                     </div>
                                </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Book Name<span class="text-danger">*</span></label>
                                    <div class="controls">
                                    <input type="text" name="book_name" class="form-control"> </div>
                                            @error('book_name') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror                                 
                                </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Book Prize<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control"> </div>
                                        @error('selling_price') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror                                 
                                    </div>
                            </div> 

                        </div>	
                    </div>	
                </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Book Discount<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control"> </div>
                                            @error('discount_price') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror                                 
                                    </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Book Code<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="book_code" class="form-control"> </div>
                                        @error('book_code') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror                                 
                                    </div>
                            </div> 
                            {{-- endof col 1 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Book Quantity<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="book_quantity" class="form-control"> </div>
                                        @error('book_quantity') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror                                 
                                    </div>
                            </div> 

                        </div>	

                        <div class="row">

                        <div class="col-md-4">
                                <div class="form-group">
                                    <label>Book Page<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="book_page" class="form-control"> </div>
                                            @error('book_page') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror                                 
                                    </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Book Language<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="book_language" class="form-control"> </div>
                                        @error('book_language') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror                                 
                                    </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Book Image<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="file" name="book_image" class="form-control" > </div>
                                        @error('book_image') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror                                 
                                    </div>
                            </div> 
                            {{-- endof col 2 --}}
                        </div>	
                        {{-- end of row 6 --}}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Book Description<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <textarea name="description" class="form-control"></textarea></div>

                                    </div>
                            </div> 

                        </div>	
                        {{-- end of row 7 --}}

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" name="hot_deal" value="1">
                                            <label for="checkbox_2">Hot Deals</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                            <label for="checkbox_3">Featured</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                            <label for="checkbox_4">Special Offer</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_5" name="special_deal" value="1">
                                            <label for="checkbox_5">Spesial Deals</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-primary mb-5" value="Add Book"></input>
                    </div>
                </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
@endsection