var applySyntaxHighlighter = function(){
    function path()
    {
      var args = arguments,
          result = []
          ;

      for(var i = 0; i < args.length; i++)
          result.push(args[i].replace('@', '/js/syntaxhighlighter/scripts/'));

      return result
    }
    
    SyntaxHighlighter.autoloader.apply(null, path(
      'bash shell             @shBrushBash.js',
      'css                    @shBrushCss.js',
      'diff patch pas         @shBrushDiff.js',
      'groovy                 @shBrushGroovy.js',
      'java                   @shBrushJava.js',
      'jfx javafx             @shBrushJavaFX.js',
      'js jscript javascript  @shBrushJScript.js',
      'perl pl                @shBrushPerl.js',
      'php                    @shBrushPhp.js',
      'text plain             @shBrushPlain.js',
      'py python              @shBrushPython.js',
      'ruby rails ror rb      @shBrushRuby.js',
      'sass scss              @shBrushSass.js',
      'sql                    @shBrushSql.js',
      'xml xhtml xslt html    @shBrushXml.js'
    ));
        
    SyntaxHighlighter.all();
}

$(document).ready(function(){
    applySyntaxHighlighter();
});