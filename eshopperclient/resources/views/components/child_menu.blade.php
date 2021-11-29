    								@if($categoryParent->categoryChildren->count())
                                    <ul role="menu" class="sub-menu">
                                    	@foreach($categoryParent->categoryChildren as $categoryChild)
                                        <li><a href="{{route('category.product', ['slug'=>$categoryChild->slug,'id'=>$categoryChild->id])}}">{{$categoryChild->name}}</a>
                                        	@if($categoryParent->categoryChildren->count())
                                        	  @include('components.child_menu',['categoryParent'=>$categoryChild])
                                        	@endif
                                        </li>
										@endforeach
                                    </ul>
                                    @endif