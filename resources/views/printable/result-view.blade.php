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
        <div style="text-align: center; margin-bottom: 30px">
            <h2>Evaluation Result</h2>
        </div>
        <div>
            <div style="font-size: 14px; font-weight: bold; margin-bottom: 5px;">
                Faculty Information
            </div>
            <ul style="list-style:none; list-style-type: none; padding: 0; margin: 0;">
                <li>Name: {{$view['faculty']['firstname'] . ' ' . $view['faculty']['lastname']}}</li>
                <li>Subject: 

                    {{-- ###################dito aayusin subject kelangan dynamic########################### --}}
                    {{-- @foreach ($view['faculty']['templates'] as $subject)
                    {{ $subject['curriculum_template'][0]['subjects']['name'] . ' (' . $subject['curriculum_template'][0]['subjects']['code'] . ')'}}
                    @endforeach --}}
                    {{     $view['faculty']['templates'][$tab - 1]['curriculum_template'][0]['subjects']['name'] . ' (' .
                         $view['faculty']['templates'][$tab - 1]['curriculum_template'][0]['subjects']['code'] . ')'    
                    }}
                </li>
                <li>Academic Stage: {{
                    to_ordinal($view['faculty']['templates'][0]['curriculum_template'][0]['year_level'], 'year') . ' & ' .
                    to_ordinal($view['faculty']['templates'][0]['curriculum_template'][0]['subject_sem'], 'semester')
                    }}
                </li>
            </ul>
        </div>

        <table style="margin-top: 10px;">
            <tr>
                <th style="width: 100%; background-color: #fff; text-transform: uppercase;">
                    Total Responses:
                    <span style="font-weight: bold; text-decoration: underline;">
                        {{$view['evaluation_result']['total_responses']}}
                    </span>
                </th>
                <th style="width: 20px; text-align:center;">Average rating</th>
                {{-- <th style="width: 20px; text-align:center; color: #5d25b8; background-color: #a689fa">Mean Squared</th>
                <th style="width: 20px; text-align:center;">Standard Deviation</th> --}}
                <th style="width: 20px; text-align:center;">Interpretation</th>
            </tr>
            @forelse ($view['evaluation_result']['stats'] as $questionnaire)
                <tr>
                    <td style="width: 100%; background-color: #ebf5ff;">
                        {{ucwords($questionnaire['criteria_name'])}}
                    </td>
                    <td style="width: 20px; text-align:center;"></td>
                    {{-- <td style="width: 20px; text-align:center; background-color: #a689fa"></td>
                    <td style="width: 20px; text-align:center;"></td> --}}
                    <td style="width: 20px; text-align:center;"></td>
                </tr>
                @forelse ($questionnaire['items'] as $items)
                    <tr>
                        <td style="width: 100%;">
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
                    <td style="width: 100%;">
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
                @endforelse
            @empty
                <div>
                    Currently no survery questionnaires added.
                </div>
            @endforelse
            {{-- <tr>
                <td style="text-align: center">
                    AVERAGES
                </td>
                <td style="width: 20px; text-align:center;">
                    {{number_format($view['evaluation_result']['averages']['mean'], 2)}}
                </td>
                <td style="width: 20px; text-align:center; color: #5d25b8; background-color: #a689fa">
                    {{number_format($view['evaluation_result']['averages']['squared_mean'], 2)}}
                </td>
                <td style="width: 20px; text-align:center;">
                    {{number_format($view['evaluation_result']['averages']['standard_deviation'], 2)}}
                </td>
                <td style="width: 20px; text-align:center;">
                    {!!strip_tags(to_interpret($view['evaluation_result']['averages']['descriptive_interpretation']))!!}
                </td>
            </tr> --}}
        </table>
        <table style="margin-top: 10px">
            <tr>
                @if ($view['evaluation_result']['total_responses'] > 0)
                    <td style="width: 50%; text-align: center; text-transform: uppercase; font-weight:bold;">
                        Descriptive Interpretation
                    </td>
                    <td >
                        The collective average rating registers at
                        <span style="font-style: bold;">{{number_format($view['evaluation_result']['averages']['mean'], 2)}}</span>.
                        {{-- accompanied by a mean squared figure of <span style="font-style: bold;">{{number_format($view['evaluation_result']['averages']['squared_mean'], 2)}}</span>
                        and a standard deviation resting at <span style="font-style: bold;">{{number_format($view['evaluation_result']['averages']['standard_deviation'], 2)}}</span>. --}}
                        In essence, the overall interpretation tends towards
                        <span style="text-decoration: underline; font-style: bold;">{!!strip_tags(to_interpret($view['evaluation_result']['averages']['descriptive_interpretation'])) !!}</span>.
                    </td>
                @else
                    <td colspan="3" style="text-align: center">
                        Descriptive Interpretation
                    </td>
                    <td colspan="12">
                        No responses yet.
                    </td>
                @endif
            </tr>
        </table>
        <br>
        {{-- Comments --}}
        <div class="col-span-12">
            <div class="p-4 mt-5 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <div class="uppercase font-bold">All Comments</div>
            </div>
            <div class="relative overflow-hidden shadow rounded-lg mt-2 max-h-56 overflow-y-auto" > 
                <table class="w-full text-sm text-left" >
                    <tbody>
                        @forelse ($view['evaluation_result']['comments'] as $key => $comments)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 text-start">
                                    <div class="w-100 flex items-center gap-8 uppercase text-xs font-medium">
                                        {{-- <div class="hidden sm:block">
                                            <svg class="w-6 h-6" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools --> <title>ic_fluent_incognito_24_regular</title> <desc>Created with Sketch.</desc> <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="ic_fluent_incognito_24_regular" fill="#212121" fill-rule="nonzero"> <path d="M17.5,12 C19.9852814,12 22,14.0147186 22,16.5 C22,18.9852814 19.9852814,21 17.5,21 C15.3591076,21 13.5674006,19.5049595 13.1119514,17.5019509 L10.8880486,17.5019509 C10.4325994,19.5049595 8.64089238,21 6.5,21 C4.01471863,21 2,18.9852814 2,16.5 C2,14.0147186 4.01471863,12 6.5,12 C8.81637876,12 10.7239814,13.7501788 10.9725684,16.000297 L13.0274316,16.000297 C13.2760186,13.7501788 15.1836212,12 17.5,12 Z M6.5,13.5 C4.84314575,13.5 3.5,14.8431458 3.5,16.5 C3.5,18.1568542 4.84314575,19.5 6.5,19.5 C8.15685425,19.5 9.5,18.1568542 9.5,16.5 C9.5,14.8431458 8.15685425,13.5 6.5,13.5 Z M17.5,13.5 C15.8431458,13.5 14.5,14.8431458 14.5,16.5 C14.5,18.1568542 15.8431458,19.5 17.5,19.5 C19.1568542,19.5 20.5,18.1568542 20.5,16.5 C20.5,14.8431458 19.1568542,13.5 17.5,13.5 Z M12,9.25 C15.3893368,9.25 18.5301001,9.58954198 21.4217795,10.2699371 C21.8249821,10.3648083 22.0749341,10.7685769 21.9800629,11.1717795 C21.8851917,11.5749821 21.4814231,11.8249341 21.0782205,11.7300629 C18.3032332,11.0771247 15.2773298,10.75 12,10.75 C8.72267018,10.75 5.69676679,11.0771247 2.9217795,11.7300629 C2.51857691,11.8249341 2.11480832,11.5749821 2.01993712,11.1717795 C1.92506593,10.7685769 2.17501791,10.3648083 2.5782205,10.2699371 C5.46989988,9.58954198 8.61066315,9.25 12,9.25 Z M15.7002538,3.25 C16.7230952,3.25 17.6556413,3.81693564 18.1297937,4.71158956 L18.2132356,4.88311922 L19.6853587,8.19539615 C19.8535867,8.57390929 19.683117,9.0171306 19.3046038,9.18535866 C18.9576335,9.33956772 18.5562903,9.20917654 18.3622308,8.89482229 L18.3146413,8.80460385 L16.8425183,5.49232692 C16.6601304,5.08195418 16.2735894,4.80422037 15.8336777,4.75711483 L15.7002538,4.75 L8.29974618,4.75 C7.85066809,4.75 7.43988259,4.99042719 7.21817192,5.37329225 L7.15748174,5.49232692 L5.68535866,8.80460385 C5.5171306,9.18311699 5.07390929,9.35358672 4.69539615,9.18535866 C4.34842577,9.03114961 4.17626965,8.64586983 4.27956492,8.29117594 L4.31464134,8.19539615 L5.78676442,4.88311922 C6.20217965,3.94843495 7.09899484,3.32651789 8.10911143,3.25658537 L8.29974618,3.25 L15.7002538,3.25 Z"> </path> </g> </g> </g></svg>
                                        </div> --}}
                                        <div>
                                            <div class="relative
                                            {{-- before:content-['❝'] before:text-lg before:pl-[-0.5rem] before:text-slate-500
                                            after:content-['❞'] after:text-lg after:pl-[-0.5rem] after:text-slate-500--}}"> 
                                            "{{$comments['comment']}}"
                                            </div>
                                            {{-- <div>
                                                {{ '- ' . $comments['commented_by']}}
                                            </div> --}}
                                            <div class = 'lowercase'>
                                                <span>negative: {{$comments['neg']}}%, neutral: {{$comments['neu']}}%, positive: {{$comments['pos']}}%, sentiment result: {{$comments['sentiment']}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @empty
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-3 text-start">
                                        <div class="text-xs font-bold uppercase text-red-500">
                                            No comments yet.
                                        </div>
                                    </td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- VADER Chart --}}
        <br>
        <table style="margin-top: 10px">
            <tr>
                @if ($view['evaluation_result']['total_responses'] > 0)
                    <td style="width: 50%; text-align: center; text-transform: uppercase; font-weight:bold;">
                        Vader Interpretation
                    </td>
                    <td >
                        The collective VADER score of
                        <span style="font-style: bold;">{{number_format($vader['score'], 2)}}</span>.
                        {{-- accompanied by a mean squared figure of <span style="font-style: bold;">{{number_format($view['evaluation_result']['averages']['squared_mean'], 2)}}</span>
                        and a standard deviation resting at <span style="font-style: bold;">{{number_format($view['evaluation_result']['averages']['standard_deviation'], 2)}}</span>. --}}
                        indicates a
                        <span style="text-decoration: underline; font-style: bold;">{!!strip_tags($vader['interpretation']) !!}</span>sentiment.
                    </td>
                @else
                    <td colspan="3" style="text-align: center">
                        Descriptive Interpretation
                    </td>
                    <td colspan="12">
                        No responses yet.
                    </td>
                @endif
            </tr>
        </table>

        
    </body>
</html>

