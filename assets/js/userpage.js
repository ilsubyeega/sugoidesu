function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function ParseRank(count300, count100, count50, countmiss, acc) {
    count300 = parseInt(count300);
    count100 = parseInt(count100);
    count50 = parseInt(count50);
    countmiss = parseInt(countmiss);
    acc = parseInt(acc);

    if (acc == 100) {
        return "SS";
    } else if ((count300 / (count300 + count100 + count50 + countmiss) * 100 > 90) && !(count50 / (count300 + count100 + count50 + countmiss) * 100 > 1) && (countmiss == 0)) {
        return "S";
    } else if (((count300 / (count300 + count100 + count50 + countmiss) * 100 > 80) && (countmiss == 0)) ||
        (count300 / (count300 + count100 + count50 + countmiss) * 100 > 90)) {
        return "A";
    } else if (((count300 / (count300 + count100 + count50 + countmiss) * 100000 > 70) && (countmiss == 0)) ||
        (count300 / (count300 + count100 + count50 + countmiss) * 100 > 80)) {
        return "B";
    } else if ((count300 / (count300 + count100 + count50 + countmiss) * 100 > 60)) {
        return "C";
    } else {
        return "D";
    }
}

function RenderBest(best) {
    var tmp1 = "";
    for (var key in best) {
        var d = new Date(best[key]['time'] * 1000);
        var dateformat = d.getFullYear() + "/" + d.getMonth() + "/" + d.getDay() + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2);
        var tmp1 = tmp1 + '<tr> <td class="p-0 text-center">' + ParseRank(best[key]['300_count'], best[key]['100_count'], best[key]['50_count'], best[key]['misses_count'], best[key]['accuracy']) + '</td>' +
            '<td><a href="#" data-toggle="tooltip" data-html="true" data-original-title="?★">' + best[key]['song_name'] + '</a></td>' +
            '<td> <a data-toggle="tooltip" data-original-title="' + best[key]['max_combo'] + 'x"><center>' + numberWithCommas(best[key]['score']) + '</center></a></td>' +
            '<td> <center> <a data-toggle="tooltip" data-original-title="' + dateformat + '">' + moment(d).fromNow() + '</a> </center> </td>' +
            '<td> <center> <a data-toggle="tooltip">' + Math.round(best[key]['pp'] * 100) / 100 + 'pp</a></center></td>' +
            '<td> <center> <a data-toggle="tooltip" data-placement="left" data-html="true" data-original-title=" 300: ' + best[key]['300_count'] + ' <br>100: ' + best[key]['100_count'] + '<br>50: ' + best[key]['50_count'] + '<br>Misses: ' + best[key]['misses_count'] + ' ">' + Math.round(best[key]['accuracy'] * 100) / 100 + '%</a> </center> </td>' +
            '</tr>';

    }
    var final = "<tbody><tr><th><center>Rank</center></th><th><center>Map</center></th><th><center>Score</center></th><th><center>Date</center></th><th><center>pp</center></th><th><center>Accuracy</center></th><th><center>Action</center></th></tr>" +
        +tmp1 + '</tbody>';
    document.getElementById("best").innerHTML = "<tbody><tr><th><center>Rank</center></th><th><center>Map</center></th><th><center>Score</center></th><th><center>Date</center></th><th><center>pp</center></th><th><center>Accuracy</center></th></tr>" + tmp1 + '</tbody>';
}

function RenderRecent(recent) {
    var tmp1 = "";
    for (var key in recent) {
        if (recent[key]['completed'] == 3) {
            var rank = ParseRank(recent[key]['300_count'], recent[key]['100_count'], recent[key]['50_count'], recent[key]['misses_count'], recent[key]['accuracy']);
            var badge = '<div class="badge badge-success" data-toggle="tooltip" data-original-title="Completed"><i class="fas fa-check"></i></div>';
        } else if (recent[key]['completed'] == 2) {
            var rank = ParseRank(recent[key]['300_count'], recent[key]['100_count'], recent[key]['50_count'], recent[key]['misses_count'], recent[key]['accuracy']);
            var badge = '<div class="badge badge-warning" data-toggle="tooltip" data-original-title="Completed but not overwritted"><i class="fas fa-grip-lines"></i></div>';
        } else {
            var rank = "X";
            var badge = '<div class="badge badge-danger" data-toggle="tooltip" data-original-title="Failed/Unsubmitted"><i class="fas fa-times"></i></div>';
        }
        var d = new Date(recent[key]['time'] * 1000);
        var dateformat = d.getFullYear() + "/" + d.getMonth() + "/" + d.getDay() + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2);
        var tmp1 = tmp1 + '<tr> <td class="p-0 text-center">' + rank + '</td>' +
            '<td><a href="#" data-toggle="tooltip" data-html="true" data-original-title="?★">' + recent[key]['song_name'] + '</a></td>' +
            '<td> <a data-toggle="tooltip" data-original-title="' + recent[key]['max_combo'] + 'x"><center>' + numberWithCommas(recent[key]['score']) + '</center></a></td>' +
            '<td> <center> <a data-toggle="tooltip" data-original-title="' + dateformat + '">' + moment(d).fromNow() + '</a> </center> </td>' +
            '<td> <center> <a data-toggle="tooltip">' + Math.round(recent[key]['pp'] * 100) / 100 + 'pp</a></center></td>' +
            '<td> <center> <a data-toggle="tooltip" data-placement="left" data-html="true" data-original-title=" 300: ' + recent[key]['300_count'] + ' <br>100: ' + recent[key]['100_count'] + '<br>50: ' + recent[key]['50_count'] + '<br>Misses: ' + recent[key]['misses_count'] + ' ">' + Math.round(recent[key]['accuracy'] * 100) / 100 + '%</a> </center> </td>' +
            '<td> <center>' + badge + '</center> </td> </tr>';

    }
    document.getElementById("recent").innerHTML = "<tbody><tr><th><center>Rank</center></th><th><center>Map</center></th><th><center>Score</center></th><th><center>Date</center></th><th><center>pp</center></th><th><center>Accuracy</center></th><th><center>Status</center></th></tr>" + tmp1 + '</tbody>';
}