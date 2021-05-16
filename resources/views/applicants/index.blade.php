@extends('layout')


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col"> id </th>
            <th scope="col"> Name </th>
            <th scope="col"> Surname </th>
            <th scope="col"> experience_years </th>
            <th scope="col"> action </th>
            <th scope="col"> action </th>
            <th scope="col"> action </th>

        </tr>
        </thead>
        <tbody>
        @foreach($applicants as $applicant)
            <tr>
                <td>{{$applicant->id}}</td>
                <td>{{$applicant->name}}</td>
                <td>{{$applicant->surname}}</td>
                <td>{{$applicant->experience_years}}</td>
                <td style="margin: 20px">
                    <button type="submit" class="btn btn-primary">
                    <a href="{{route('applicants.edit',$applicant->id)}}" style="color: white">Edit</a>
                    </button>
                </td>

                <td>
                    <button type="submit" class="btn btn-primary">
                        @if($applicant->is_hired)
                        <a href="{{route('applicants.hire',[$applicant->id,1])}}" style="color: white">hired</a>
                        @else
                            <a href="{{route('applicants.hire',[$applicant->id,0])}}" style="color: white">not hired</a>
                        @endif
                    </button>
                </td>

                <td>
                    <form method="post" action="{{route('applicants.delete',$applicant->id)}}">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>

                </td>


            </tr>
        @endforeach

        </tbody>
    </table>

    {{$applicants->links()}}
@endsection
