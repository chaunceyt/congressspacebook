<div id="page">
        <div id="content">
                <div class="post">
<br/>

                        <div class="entry"  style="padding-left:90px;">
                        <h2 class="title">/latest updates</h2>
<ul id="latest_commits">
    <li>...loading from github...</li>
</ul>

<script type="text/javascript">
    function latest_commits(resp) { 
        var html = '';
        for(var i=0; i < resp.commits.length; ++i) {
            var commit = resp.commits[i];
            html += ('<li style="list-style:circle; font-size: 1em;  line-height: 1.5em; margin: 0 0 0 0;"><a href="' + commit.url + '">commit</a> ' + commit.message + ' [' + commit.committed_date.substr(0,10) + ']</li>\n');
        }
        document.getElementById('latest_commits').innerHTML = html;
    }
</script>

<script type="text/javascript" src="http://github.com/api/v2/json/commits/list/chaunceyt/congressspacebook/master/?callback=latest_commits"></script>
</div>
</div>
</div>
</div>
