<div class="text-center">
    <h5 class="text-dark">
        <i class="fas fa-list-alt"></i>
        Health condition and Visit place of Employees and Families</h5>
    <h6 class="mb-4 text-dark">{{$name}}(
        {{$total}}
        Employees)</h6>
</div>
<table class="table table-bordered table-sm text-dark ">
    <thead>
        <tr style="background: {{ ($total > 0) ? '#E5F8FF' : '#d9d9d9' }}"> 
            <th scope="col" class="text-center align-middle" rowspan="2" width="25%">Name of Employees</th>
            <th scope="col" class="text-center align-middle" rowspan="2">Submit</th>
            <th scope="col" class="text-center align-middle" rowspan="2">No. Family</th>
            <th scope="col" class="text-center align-middle" colspan="3">Health (KP)</th>
            <th scope="col" class="text-center align-middle" rowspan="2">Visit to other city</th>
            <th scope="col" class="text-center align-middle" colspan="3">Health (Familty)</th>
            <th scope="col" class="text-center align-middle" rowspan="2">Visit to other city</th>
        </tr>
        <tr style="background: {{ ($total > 0) ? '#CCF2FF' : '#d9d9d9' }}">
            <th scope="col" class="text-center align-middle">Fever</th>
            <th scope="col" class="text-center align-middle">Cough</th>
            <th scope="col" class="text-center align-middle">Flu</th>
            <th scope="col" class="text-center align-middle">Fever</th>
            <th scope="col" class="text-center align-middle">Cough</th>
            <th scope="col" class="text-center align-middle">Flu {{ count($team) }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($total > 0)
            @foreach ($team as $team)
            <tr>
                <th scope="row">
                    <a href="#" class="text-dark detail">{{$team['name']}}</a>
                </th>

                <td class="text-center align-middle" style="font-size: 12px;">
                    @if ($report_status == 1 )
                    <i class="far fa-circle">Y</i>
                    @else
                    <i class="far fa-user">X</i>
                    @endif
                </td>
                
                <td class="text-center">{{$total_family}}</td>

                @foreach ($team['UserReport'] as $userreport)
                <td class="text-center">
                    @if ($userreport['fever'] == 1 )
                    <span class="bg-danger">Yes</span>
                    @else
                    <span class="bg-success">No</span>
                    @endif
                </td>
                <td class="text-center">
                    @if ($userreport['cough'] == 1 )
                    <span class="bg-danger">Yes</span>
                    @else
                    <span class="bg-success">No</span>
                    @endif
                </td>
                <td class="text-center">
                    @if ($userreport['flue'] == 1 )
                    <span class="bg-danger">Yes</span>
                    @else
                    <span class="bg-success">No</span>
                    @endif
                </td>
                    <td class="text-center">
                    @if ($userreport['visit_oth_city'] == 1 )
                    <span class="bg-danger">Yes</span>
                    @else
                    <span class="bg-success">No</span>
                    @endif
                </td>
                @endforeach

                @foreach ($team['FamilyReport'] as $familyreport)
                <td class="text-center">
                    @if ($familyreport['fever'] == 1 )
                    <span class="bg-danger">Yes</span>
                    @else
                    <span class="bg-success">No</span>
                    @endif
                </td>
                <td class="text-center">@if ($familyreport['cough'] == 1 )
                    <span class="bg-danger">Yes</span>
                    @else
                    <span class="bg-success">No</span>
                    @endif</td>
                <td class="text-center">@if ($familyreport['flue'] == 1 )
                    <span class="bg-danger">Yes</span>
                    @else
                    <span class="bg-success">No</span>
                    @endif</td>
                <td class="text-center">
                    @if ($familyreport['visit_oth_city'] == 1 )
                    <span class="bg-danger">Yes</span>
                    @else
                    <span class="bg-success">No</span>
                    @endif
                </td>
                @endforeach
            </tr>

            @endforeach
        @else
            <tr>
                <td class="text-center font-italic" colspan="11">No data available for now</td>
            </tr>
        @endif

    </tbody>
</table>

<div class="row">
    <div class="col-md-6">
        @if ($total > 0)
        <p class="font-italic text-info">*Last updated: 23:50 17/04/2020</p>
        @endif
    </div>
    <div class="col-md-6 text-right">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
            Kembali</a>
            @if ($total > 0)
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Export to Excel</a>
            @endif
    </div>
</div>
