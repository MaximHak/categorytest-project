<?
if (isset($id)){
$parent_id = $id;
}else{
    $parent_id = null;
}
$dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}"
    @if($parent_id == $subcategory->id)
selected
        @endif
    >{{$dash}}{{$subcategory->name}}</option>
    @if(count($subcategory->subcategory))
        @include('subCategoryList-option',['subcategories' => $subcategory->subcategory,'parent_id' => $parent_id])
    @endif
@endforeach
