@extends('layouts.Adminauth')
@section('content')

	<div class="categorypageCont viewPDFCont">

        <div class="updateroleDisplay">

            <div class="pdfinfoCard">

				<li class="paperinfoHeader">
					Change Roles
				</li>

				<li class="pdfpaperInfo">
                    <form action="{{ route('Changes.update', $user->UserID) }} " method="POST" >
                            @csrf
                            @method('PUT')

                           User: {{ $user->LastName}},{{ $user->FirstName}}<br><br>
                            Role: 
                            @if( $user->isAdmin == '1')
                                Admin
                            @else
                                User
                            
                            @endif
                        <div class="subcatPicker pdfbtnCont">
                            <select class="catSelect selectType" name="isAdmin">
                                <option selected disabled>Choose a new role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                            <button class="pdfBtn redBtn" type="submit">Update</button>
                        </div>
                    </form>
				</li>

            </div>
        
        </div>
    </div>

	<footer>
		<p>Silliman University Digital Repository</p>
	</footer>


	@endsection