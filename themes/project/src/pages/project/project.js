import * as hljs from '@src/js/highlight.min';


   document.querySelectorAll('pre code').forEach((el) => {
      hljs.highlightElement(el);
   });

