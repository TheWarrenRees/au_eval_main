<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    font-family: 'Poppins' !important;
}

ul {
    font-size: 12px;
}

table {
  font-family: 'Poppins' !important;
  border-collapse: collapse;
  width: 100%;
  font-size: 12px;
  border: 1px solid #66768c;
}

table td, table th {
  border: 1px solid #66768c;
  padding: 8px;
}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #fff;
  color: #1e429e;
}
</style>
</head>
<body>
<div style="text-align: center; margin-bottom: 30px; text-transform: uppercase">
    <h2>Evaluation Result</h2>
</div>
<div style="margin-bottom: 1rem;">
    {{-- @dd($view['faculty']->toArray()); --}}
    <div style="gap: 0.5rem; margin-top: 1.25rem; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-bottom-width: 1px; border-top-right-radius: 0.5rem; border-bottom-left-radius: 0.5rem; border-color: #4B5563;">
        <h3 style="font-size: 15px; font-weight: bold; text-transform: uppercase;">Faculty Information</h3>
        @if ($has_image)
        <div>
            <img src="{{$view['faculty']['image'] ? asset('storage/images/student/' . $view['faculty']['image']) : 'https://ui-avatars.com/api/?name='.$view['faculty']['firstname'] . ' ' . $view['faculty']['lastname'].'&length=2&bold=true&color=ff0000&background=random'}}" style="border-radius: 0.375rem; width: 80px; height: 80px;" />
        </div>
        @endif
        <div>
            <ul style="margin-top: 0.75rem; font-size: 0.875rem; list-style: none; margin-left: 0; padding-left: 0;">
                <li>Employee #: {{$view['faculty']->employee_number}}</li>
                <li>Full Name: {{$view['faculty']->firstname . ' ' . $view['faculty']->lastname}}</li>
                <li>Email: {{$view['faculty']->email}}</li>
                <li>Username: {{$view['faculty']->username}}</li>
                <hr style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
            </ul>
        </div>
    </div>
</div>
<div>
    <h3 style="font-size: 15px; font-weight: bold; text-transform: uppercase;">All Subject Results</h3>
</div>
@foreach ($view['evaluation_results'] as $data_key => $data)
    <table style="width: 100%; margin-top: 15px;">
        <tr>
            <th style="width: 100%; background-color: #fff; text-transform: uppercase;">
                <div style="display: flex">
                    <div>
                        <span style="font-weight: bold; text-decoration: underline;">
                            {{ strtoupper($data['template']['curriculum_template'][0]['subjects']['code']) }}
                        </span>
                    </div>
                    <div>
                        <span style="font-weight: bold; text-decoration: underline;">
                            {{ strtoupper($data['template']['curriculum_template'][0]['subjects']['name']) }}
                        </span>
                    </div>
                </div>
            </th>
            <th style="border: none"></th>
            {{-- <th style="border: none"></th>
            <th style="border: none"></th> --}}
            <th style="border-left: none"></th>
        </tr>
        <tr>
            <th style="width: 100%; background-color: #fff; text-transform: uppercase;">
                Total Responses:
                <span style="font-weight: bold; text-decoration: underline;">
                    {{$data['total_responses']}}
                </span>
            </th>
            <th style="width: 20px; text-align:center;">Average Rating</th>
            {{-- <th style="width: 20px; text-align:center; color: #5d25b8; background-color: #a689fa">Mean Squared</th>
            <th style="width: 20px; text-align:center;">Standard Deviation</th> --}}
            <th style="width: 20px; text-align:center;">Interpretation</th>
        </tr>
        @forelse ($data['stats'] as $questionnaire)
            <tr>
                <td style="width: 20px; background-color: #ebf5ff;">
                    {{ucwords($questionnaire['criteria_name'])}}
                </td>
                <td style="width: 20px; text-align:center;"></td>
                {{-- <td style="width: 20px; text-align:center; background-color: #a689fa"></td>
                <td style="width: 20px; text-align:center;"></td> --}}
                <td style="width: 20px; text-align:center;"></td>
            </tr>
            @forelse ($questionnaire['items'] as $items)
                <tr>
                    <td style="width: 20px;">
                        {{$items['name']}}
                    </td>
                    <td style="width: 20px; text-align:center;">
                        {{number_format($items['weighted_mean'], 2)}}
                    </td>
                    {{-- <td style="width: 20px; text-align:center; color: #5d25b8; background-color: #a689fa">
                        {{number_format($items['mean_squared'], 2)}}
                    </td>
                    <td style="width: 20px; text-align:center;">
                        {{number_format($items['standard_deviation'], 2)}}
                    </td> --}}
                    <td style="width: 20px; text-align:center;">
                        {!!strip_tags(to_interpret($items['interpretation']))!!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td style="width: 100%; text-align:center;">
                        No responses yet
                    </td>
                    <td style="width: 20px; text-align:center;">
                        {{number_format(0, 2)}}
                    </td>
                    {{-- <td style="width: 20px; text-align:center; color: #5d25b8; background-color: #a689fa">
                        {{number_format(0, 2)}}
                    </td>
                    <td style="width: 20px; text-align:center;">
                        {{number_format(0, 2)}}
                    </td> --}}
                    <td style="width: 20px; text-align:center;">
                        {{ 'No responses yet.' }}
                    </td>
                </tr>
                {{-- <tr>
                    <td colspan="1" style="width: 20px; text-align:center;">
                        AVERAGES
                    </td>
                    <td style="width: 20px; text-align:center;">
                        {{number_format($data['averages']['mean'], 2)}}
                    </td>
                    <td style="width: 20px; text-align:center;">
                        {{number_format($data['averages']['squared_mean'], 2)}}
                    </td>
                    <td style="width: 20px; text-align:center;">
                        {{number_format($data['averages']['standard_deviation'], 2)}}
                    </td>
                    <td style="width: 20px; text-align:center">
                        {!!to_interpret($data['averages']['descriptive_interpretation'])!!}
                    </td>
                </tr> --}}
            @endforelse
        @empty
            <div>
                Currently no survey questionnaires added.
            </div>
        @endforelse
    </table>
    <table style="margin-top: 5px">
        <tr>
            <td style="width: 100%; text-align:center">
                Descriptive Interpretation
            </td>
                <td style="width: 100%; text-align:center">
                    The collective weighted mean registers at
                    <span style="font-style: bold;">{{number_format($data['averages']['mean'], 2)}},</span>.
                    {{-- accompanied by a mean squared figure of {{number_format($data['averages']['squared_mean'], 2)}}
                    and a standard deviation resting at {{number_format($data['averages']['standard_deviation'], 2)}}. --}}
                    In essence, the overall interpretation tends towards
                    {!!strip_tags(to_interpret($items['interpretation']))!!}
                </td>
            </tr>
        </table>
    @endforeach
</body>
</html>

