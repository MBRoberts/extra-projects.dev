var app = angular.module("app", []).directive("codeEditor", function(){
  return {
    restrict: "E",
    replace: true,
    scope: {
      syntax: "@",
      theme: "@"
    },
    templateUrl: "../editor-template.html",
    link: function(scope, element, attrs) {
      var editor = CodeMirror(element[0], {
        mode: scope.syntax || "javascript",
        theme: scope.theme || "vibrant-ink",
        lineNumbers: true
      });
    }
  };
});