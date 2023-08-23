<!DOCTYPE html>
<html>
<head>
  <title>Likes Bar Chart</title>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<style>

.bar {
  fill: red;
}

.bar:hover {
  fill: green;
}

.axis--x path {
  display: none;
}

#floatingRectangle {
        margin-right: 0%;
        width: 400px;
    }

</style>
</head>
<body>
<h3 class="text-bg-primary">Course Number For Each Question</h3> <div class="container-fluid">

                    
<svg width="300" height="500"></svg>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>

var svg = d3.select("svg"),
    margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom;

var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
    y = d3.scaleLinear().rangeRound([height, 0]);
    console.log(y(3));

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

//specify our data source
/*
d3.tsv("data.tsv", function(d) {
  d.frequency = +d.frequency;
  return d;
}, function(error, data) {
*/

d3.json("getDataD3JO.php?qid=<?php
if(isset($_GET["questionid"])) echo $_GET["questionid"];

?>", function(error, data){
    if(error) throw error;

  data.forEach(function(d){
    d.letter = d.questionbody;
    d.frequency = +d.coursenumber;
  })

  console.log(data);

  if (error) throw error;

  x.domain(data.map(function(d) { return d.letter; }));
  y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

  g.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));

  g.append("g")
      .attr("class", "axis axis--y")
      .call(d3.axisLeft(y).ticks(5, "s"))
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 10)
      .attr("dy", "0.71em")
      .attr("text-anchor", "end")
      .text("Frequency");

  g.selectAll(".bar")
    .data(data)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return x(d.letter); })
      .attr("y", function(d) { return y(d.frequency); })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return height - y(d.frequency); });
});



</script>
<nav>
    Differnet Level of Classes
        <ol>
                <ul>1k -> Freshment/Intro Classes</ul>
                <ul>2k -> Sophomore Level Classses</ul>
                <ul>3k -> Junior Level Classes</ul>
                <ul>4k -> Senior Level Classes</ul>
                <ul>5k -> Masters Level Classes</ul>
        </ol> 
    
    </nav>
<div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <div class="btn-group" role="group" aria-label="Basic example" id="floatingRectangle"><a
                                class="btn btn-primary" href="QuestionDashJO.php" role="button">Back to Dashboard</a>
                        </div>
                    </div>
                </div>
</body>
</html>