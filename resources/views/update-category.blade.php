<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<section class="content" style="padding:20px 30%;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Category</h3>
                </div>
                @if($category)
                    @foreach($category as $category)
                        <form role="form" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Category name*</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Category name"

                                                   value="{{$category->name}}"

                                                   required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Select parent category*</label>
                                            <select type="text" name="parent_id" class="form-control">
                                                <option value="">None</option>
                                                @if($categoriesParents)
                                                    @foreach($categoriesParents as $categories)
                                                        <?
                                                        $dash = '';
                                                        $parent_id = $category->parent_id;
                                                        ?>
                                                        <option value="{{$categories->id}}"
                                                                @if($parent_id == $categories->id)
                                                                selected
                                                            @endif
                                                        >{{$categories->name}}</option>
                                                        @if(count($categories->subcategory))
                                                            @include('subCategoryList-option',['subcategories' => $categories->subcategory,'id' => $parent_id])
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>

                            </div>
                        </form>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
