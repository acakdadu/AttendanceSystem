<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary"><i class="fas fa-arrow-left fa-sm text-white-50"></i>Kembali</a>

<div class="text-center">
    <h5 class="text-dark mb-3">
        <i class="fas fa-list-alt"></i>
        Health condition and Visit place of Employees and Families</h5>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: {{ (($progressReport/count($employees))*100) }}%" aria-valuenow="{{ (($progressReport/count($employees))*100) }}" aria-valuemin="0" aria-valuemax="100">{{ (($progressReport/count($employees))*100) }}%</div>
    </div>
    <code class="text-right m-0 mb-2 mt-1 text-muted d-block">[{{ $progressReport}} of {{ count($employees) }} ] On Progress ..</code>
</div>
<table class="table table-bordered table-sm text-dark table-hover">
    <thead>
        <tr style="background: {{ ($total > 0) ? '#E5F8FF' : '#d9d9d9' }}"> 
            <th scope="col" class="text-center align-middle" rowspan="2">No.</th>
            <th scope="col" class="text-center align-middle" rowspan="2" width="25%">Name of Employees</th>
            <th scope="col" class="text-center align-middle" rowspan="2">Submit</th>
            <th scope="col" class="text-center align-middle" colspan="3">Health</th>
            <th scope="col" class="text-center align-middle" rowspan="2">Visit to other city</th>
            <th scope="col" class="text-center align-middle" rowspan="2">No. Family</th>
            <th scope="col" class="text-center align-middle" colspan="3">Health (Familty)</th>
            <th scope="col" class="text-center align-middle" rowspan="2">Visit to other city</th>
        </tr>
        <tr style="background: {{ ($total > 0) ? '#CCF2FF' : '#d9d9d9' }}">
            <th scope="col" class="text-center align-middle">Fever</th>
            <th scope="col" class="text-center align-middle">Cough</th>
            <th scope="col" class="text-center align-middle">Flu</th>
            <th scope="col" class="text-center align-middle">Fever</th>
            <th scope="col" class="text-center align-middle">Cough</th>
            <th scope="col" class="text-center align-middle">Flu</th>
        </tr>
    </thead>
    <tbody>
        @if ($total > 0)
            @foreach ($employees as $employee)
            <tr style="background: 
            @IF ($employee->m_fever > 0 || $employee->m_cough > 0 || $employee->m_flue > 0 || $employee->f_fever > 0 || $employee->f_cough > 0 || $employee->f_flue > 0)
            #ffe0e0
            @ELSEIF ($employee->submit)
            #f0ffe0

            @ENDIF
            ">
                <th scope="row" class="text-center align-middle">
                    {{ $loop->iteration }}
                </th>
                <th scope="row">
                    <a href="#" class="text-dark detail">{{  strtoupper($employee->name) }}</a>
                </th>

                <td class="text-center align-middle" style="font-size: 12px;">
                    @if ($employee->submit !== NULL)
                    <i class="fas fa-check"></i>
                    @else
                    <i class="fas fa-times"></i>
                    @endif
                </td>
                

                <td class="text-center">{{ ($employee->m_fever) ? 'Yes' : 'No' }}</td>
                <td class="text-center">{{ ($employee->m_cough) ? 'Yes' : 'No' }}</td>
                <td class="text-center">{{ ($employee->m_flue) ? 'Yes' : 'No' }}</td>

                <td class="text-center align-middle" style="font-size: 12px;">
                    @if ($employee->m_voc)
                    {{ $employee->visiting }}
                    @else
                    -
                    @endif
                </td>

                <td class="text-center">{{ $empFamilies[$loop->index]->noFamilies }}</td>

                <td class="text-center">{{ $submit) ? 'Yes' : 'Yes; M, F, B' }}</td>
                <td class="text-center">{{ $submit) ? 'Yes' : 'No' }}</td>
                <td class="text-center">{{ $submit ? 'Yes' : 'No' }}</td>
                
                
                <td class="text-center align-middle" style="font-size: 12px;">
                    @if $submit                    <i class="far fa-circle"></i>
                    @else
                    -
                    @endif
                </td>
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
        @if ($total > 0)
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i>
        Export to Excel</a>
        @endif
    </div>
</div>
