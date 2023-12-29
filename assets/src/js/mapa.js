jQuery(document).ready(function ($) {
  $ = jQuery;

  // Efecto para desplegar cantones
  $provincia = $(".provincia"),
    $titleProvincia = $("#result").find("h3"),
    $ContentProvincia = $("#result").find("div");
  // Escucha evento click
  $provincia.click(function (e) {
    showProvinceData($(this).data("id"), $(this).data("title"));
  });

  function showProvinceData(id, title) {
    sessionStorage.setItem("Provincia", JSON.stringify(id));
    $("#result").find("ul").remove();
    $(".mapContainer").css({
      left: 0,
      "margin-left": 0,
    });
    $(".result").css({
      opacity: 1,
      position: "relative",
      "z-index": 1,
      width: "40%",
    });
    $(".publicidad").css({
      display: "none",
    });
    $(".data-" + id)
      .clone()
      .appendTo($ContentProvincia);
    $titleProvincia.text(title);
    $('li.cat-item').addClass('list-group-item list-group-flush');
  }

  if (
    JSON.parse(sessionStorage.getItem("Provincia")) !== null
  ) {
    var selectedProvinceId = JSON.parse(sessionStorage.getItem("Provincia"));
    $("#result").find("ul").remove();
    $(".mapContainer").css({
      left: 0,
      "margin-left": 0,
    });
    $(".result").css({
      opacity: 1,
      position: "relative",
      "z-index": 1,
      width: "40%",
    });
    $(".publicidad").css({
      display: "block",
    });
    $(".data-" + selectedProvinceId)
      .clone()
      .appendTo($ContentProvincia);
    $titleProvincia.text(selectedProvinceId);
    $('li.cat-item').addClass('list-group-item list-group-flush');
  } else {
    $provincia.click(function (e) {
      e.preventDefault();
      showProvinceData($(this).data("id"), $(this).data("title"));
    });
  }

  // Tooltip provincias
  $(".map").tooltip({
    track: true,
  });

  // Nav Mobile
  $("#navIcon").click(function (e) {
    e.preventDefault();
    $("nav").slideToggle("slow");
  });
});
