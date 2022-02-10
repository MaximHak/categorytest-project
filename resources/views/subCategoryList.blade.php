@foreach($subcategories as $subcategory)
    <ul>
        <li style="margin: inherit;display: -webkit-box;">{{$subcategory->name}}
            <div style="display: flex;width: 100%;">
                <a type="button" href="edit/{{$subcategory->id}}" style="margin-left: 50%;"  class="btn btn-primary">Update</a>
                <a type="button" href="delete/{{$subcategory->id}}"  style="margin-left: 10%;" class="btn btn-danger">Delete</a>
            </div>
        </li>

        @if(count($subcategory->subcategory))
            @include('subCategoryList',['subcategories' => $subcategory->subcategory])
        @endif
    </ul>
@endforeach
