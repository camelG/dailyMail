<style>
.card{
    width: 640px;
    border: solid 1px;
    padding: 14px 10px;
    border-radius: 7px;
}

.timeline {
  list-style: none;
}
.timeline > li {
  margin-bottom: 60px;
}
.timeline > li {
  overflow: hidden;
  margin: 0;
  position: relative;
}
.timeline-date {
  width: 110px;
  float: left;
  margin-top: 20px;
}
.timeline-content {
  width: 75%;
  float: left;
  border-left: 3px #e5e5d1 solid;
  padding-left: 30px;
}
.timeline-content:before {
  content: '';
  width: 12px;
  height: 12px;
  background: #6fc173;
  position: absolute;
  left: 106px;
  top: 24px;
  border-radius: 100%;
}
</style>
<div class="card">
  <div class="card-body">
    <p class="card-text">{!! nl2br($text) !!}</p>
    @if ($job)
      <ul class="timeline">
      @foreach ($job as $j)
        <li>
          <p class="timeline-date">{{ $jobstart[$loop->index] }}-{{ $jobend[$loop->index] }}</p>
          <div class="timeline-content">
            <h3>{{ $j }}</h3>
            <p>{!! nl2br($jobinfo[$loop->index]) !!}</p>
          </div>
        </li>
      @endforeach
      </ul>
    @endif
    <p class="card-text">{!! nl2br($hope) !!}</p>
<p style="text-align: right;margin-right: 12px;">以上</p>
  </div>
</div>