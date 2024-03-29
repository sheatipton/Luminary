/*
 *  Document   : be_ui_icons.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Icons Page
 */

class pageIcons {
  /*
   * Icon init on page
   *
   */
  static iconsInit() {
    let regularList = ["address-book","address-card","bell","bell-slash","bookmark","building","calendar","calendar-check","calendar-days","calendar-minus","calendar-plus","calendar-xmark","chart-bar","chess-bishop","chess-king","chess-knight","chess-pawn","chess-queen","chess-rook","circle","circle-check","circle-dot","circle-down","circle-left","circle-pause","circle-play","circle-question","circle-right","circle-stop","circle-up","circle-user","circle-xmark","clipboard","clock","clone","closed-captioning","comment","comment-dots","comments","compass","copy","copyright","credit-card","envelope","envelope-open","eye","eye-slash","face-angry","face-dizzy","face-flushed","face-frown","face-frown-open","face-grimace","face-grin","face-grin-beam","face-grin-beam-sweat","face-grin-hearts","face-grin-squint","face-grin-squint-tears","face-grin-stars","face-grin-tears","face-grin-tongue","face-grin-tongue-squint","face-grin-tongue-wink","face-grin-wide","face-grin-wink","face-kiss","face-kiss-beam","face-kiss-wink-heart","face-laugh","face-laugh-beam","face-laugh-squint","face-laugh-wink","face-meh","face-meh-blank","face-rolling-eyes","face-sad-cry","face-sad-tear","face-smile","face-smile-beam","face-smile-wink","face-surprise","face-tired","file","file-audio","file-code","file-excel","file-image","file-lines","file-pdf","file-powerpoint","file-video","file-word","file-zipper","flag","floppy-disk","folder","folder-open","font-awesome","futbol","gem","hand","hand-back-fist","hand-lizard","hand-peace","hand-point-down","hand-point-left","hand-point-right","hand-point-up","hand-pointer","hand-scissors","hand-spock","handshake","hard-drive","heart","hospital","hourglass","id-badge","id-card","image","images","keyboard","lemon","life-ring","lightbulb","map","message","money-bill-1","moon","newspaper","note-sticky","object-group","object-ungroup","paper-plane","paste","pen-to-square","rectangle-list","rectangle-xmark","registered","share-from-square","snowflake","square","square-caret-down","square-caret-left","square-caret-right","square-caret-up","square-check","square-full","square-minus","square-plus","star","star-half","star-half-stroke","sun","thumbs-down","thumbs-up","trash-can","user","window-maximize","window-minimize","window-restore"];
    let solidList = ["0","1","2","3","4","5","6","7","8","9","a","address-book","address-card","align-center","align-justify","align-left","align-right","anchor","angle-down","angle-left","angle-right","angle-up","angles-down","angles-left","angles-right","angles-up","ankh","apple-whole","archway","arrow-down","arrow-down-1-9","arrow-down-9-1","arrow-down-a-z","arrow-down-long","arrow-down-short-wide","arrow-down-wide-short","arrow-down-z-a","arrow-left","arrow-left-long","arrow-pointer","arrow-right","arrow-right-arrow-left","arrow-right-from-bracket","arrow-right-long","arrow-right-to-bracket","arrow-rotate-left","arrow-rotate-right","arrow-trend-down","arrow-trend-up","arrow-turn-down","arrow-turn-up","arrow-up","arrow-up-1-9","arrow-up-9-1","arrow-up-a-z","arrow-up-from-bracket","arrow-up-long","arrow-up-right-from-square","arrow-up-short-wide","arrow-up-wide-short","arrow-up-z-a","arrows-left-right","arrows-rotate","arrows-up-down","arrows-up-down-left-right","asterisk","at","atom","audio-description","austral-sign","award","b","baby","baby-carriage","backward","backward-fast","backward-step","bacon","bacteria","bacterium","bag-shopping","bahai","baht-sign","ban","ban-smoking","bandage","barcode","bars","bars-progress","bars-staggered","baseball","baseball-bat-ball","basket-shopping","basketball","bath","battery-empty","battery-full","battery-half","battery-quarter","battery-three-quarters","bed","bed-pulse","beer-mug-empty","bell","bell-concierge","bell-slash","bezier-curve","bicycle","binoculars","biohazard","bitcoin-sign","blender","blender-phone","blog","bold","bolt","bolt-lightning","bomb","bone","bong","book","book-atlas","book-bible","book-journal-whills","book-medical","book-open","book-open-reader","book-quran","book-skull","bookmark","border-all","border-none","border-top-left","bowling-ball","box","box-archive","box-open","box-tissue","boxes-stacked","braille","brain","brazilian-real-sign","bread-slice","briefcase","briefcase-medical","broom","broom-ball","brush","bug","bug-slash","building","building-columns","bullhorn","bullseye","burger","bus","bus-simple","business-time","c","cake-candles","calculator","calendar","calendar-check","calendar-day","calendar-days","calendar-minus","calendar-plus","calendar-week","calendar-xmark","camera","camera-retro","camera-rotate","campground","candy-cane","cannabis","capsules","car","car-battery","car-crash","car-rear","car-side","caravan","caret-down","caret-left","caret-right","caret-up","carrot","bag-arrow-down","bag-flatbed","bag-flatbed-suitcase","bag-plus","bag-shopping","cash-register","cat","cedi-sign","cent-sign","certificate","chair","chalkboard","chalkboard-user","champagne-glasses","charging-station","chart-area","chart-bar","chart-column","chart-gantt","chart-line","chart-pie","check","check-double","check-to-slot","cheese","chess","chess-bishop","chess-board","chess-king","chess-knight","chess-pawn","chess-queen","chess-rook","chevron-down","chevron-left","chevron-right","chevron-up","child","church","circle","circle-arrow-down","circle-arrow-left","circle-arrow-right","circle-arrow-up","circle-check","circle-chevron-down","circle-chevron-left","circle-chevron-right","circle-chevron-up","circle-dollar-to-slot","circle-dot","circle-down","circle-exclamation","circle-h","circle-half-stroke","circle-info","circle-left","circle-minus","circle-notch","circle-pause","circle-play","circle-plus","circle-question","circle-radiation","circle-right","circle-stop","circle-up","circle-user","circle-xmark","city","clapperboard","clipboard","clipboard-check","clipboard-list","clock","clock-rotate-left","clone","closed-captioning","cloud","cloud-arrow-down","cloud-arrow-up","cloud-meatball","cloud-moon","cloud-moon-rain","cloud-rain","cloud-showers-heavy","cloud-sun","cloud-sun-rain","clover","code","code-branch","code-commit","code-compare","code-fork","code-merge","code-pull-request","coins","colon-sign","comment","comment-dollar","comment-dots","comment-medical","comment-slash","comment-sms","comments","comments-dollar","compact-disc","compass","compass-drafting","compress","computer-mouse","cookie","cookie-bite","copy","copyright","couch","credit-card","crop","crop-simple","cross","crosshairs","crow","crown","crutch","cruzeiro-sign","cube","cubes","d","database","delete-left","democrat","desktop","dharmachakra","diagram-next","diagram-predecessor","diagram-project","diagram-successor","diamond","diamond-turn-right","dice","dice-d20","dice-d6","dice-five","dice-four","dice-one","dice-six","dice-three","dice-two","disease","divide","dna","dog","dollar-sign","dolly","dong-sign","door-closed","door-open","dove","down-left-and-up-right-to-center","down-long","download","dragon","draw-polygon","droplet","droplet-slash","drum","drum-steelpan","drumstick-bite","dumbbell","dumpster","dumpster-fire","dungeon","e","ear-deaf","ear-listen","earth-africa","earth-americas","earth-asia","earth-europe","earth-oceania","egg","eject","elevator","ellipsis","ellipsis-vertical","envelope","envelope-open","envelope-open-text","envelopes-bulk","equals","eraser","ethernet","euro-sign","exclamation","expand","eye","eye-dropper","eye-low-vision","eye-slash","f","face-angry","face-dizzy","face-flushed","face-frown","face-frown-open","face-grimace","face-grin","face-grin-beam","face-grin-beam-sweat","face-grin-hearts","face-grin-squint","face-grin-squint-tears","face-grin-stars","face-grin-tears","face-grin-tongue","face-grin-tongue-squint","face-grin-tongue-wink","face-grin-wide","face-grin-wink","face-kiss","face-kiss-beam","face-kiss-wink-heart","face-laugh","face-laugh-beam","face-laugh-squint","face-laugh-wink","face-meh","face-meh-blank","face-rolling-eyes","face-sad-cry","face-sad-tear","face-smile","face-smile-beam","face-smile-wink","face-surprise","face-tired","fan","faucet","fax","feather","feather-pointed","file","file-arrow-down","file-arrow-up","file-audio","file-code","file-contract","file-csv","file-excel","file-export","file-image","file-import","file-invoice","file-invoice-dollar","file-lines","file-medical","file-pdf","file-powerpoint","file-prescription","file-signature","file-video","file-waveform","file-word","file-zipper","fill","fill-drip","film","filter","filter-circle-dollar","filter-circle-xmark","fingerprint","fire","fire-extinguisher","fire-flame-curved","fire-flame-simple","fish","flag","flag-checkered","flag-usa","flask","floppy-disk","florin-sign","folder","folder-minus","folder-open","folder-plus","folder-tree","font","font-awesome","football","forward","forward-fast","forward-step","franc-sign","frog","futbol","g","gamepad","gas-pump","gauge","gauge-high","gauge-simple","gauge-simple-high","gavel","gear","gears","gem","genderless","ghost","gift","gifts","glasses","globe","golf-ball-tee","gopuram","graduation-cap","greater-than","greater-than-equal","grip","grip-lines","grip-lines-vertical","grip-vertical","guarani-sign","guitar","gun","h","hammer","hamsa","hand","hand-back-fist","hand-dots","hand-fist","hand-holding","hand-holding-dollar","hand-holding-droplet","hand-holding-heart","hand-holding-medical","hand-lizard","hand-middle-finger","hand-peace","hand-point-down","hand-point-left","hand-point-right","hand-point-up","hand-pointer","hand-scissors","hand-sparkles","hand-spock","hands","hands-asl-interpreting","hands-bubbles","hands-clapping","hands-holding","hands-praying","handshake","handshake-angle","handshake-simple-slash","handshake-slash","hanukiah","hard-drive","hashtag","hat-cowboy","hat-cowboy-side","hat-wizard","head-side-cough","head-side-cough-slash","head-side-mask","head-side-virus","heading","headphones","headphones-simple","headset","heart","heart-crack","heart-pulse","helicopter","helmet-safety","highlighter","hippo","hockey-puck","holly-berry","horse","horse-head","hospital","hospital-user","hot-tub-person","hotdog","hotel","hourglass","hourglass-empty","hourglass-end","hourglass-start","house","house-chimney","house-chimney-crack","house-chimney-medical","house-chimney-user","house-chimney-window","house-crack","house-laptop","house-medical","house-user","hryvnia-sign","i","i-cursor","ice-cream","icicles","icons","id-badge","id-card","id-card-clip","igloo","image","image-portrait","images","inbox","indent","indian-rupee-sign","industry","infinity","info","italic","j","jedi","jet-fighter","joint","k","kaaba","key","keyboard","khanda","kip-sign","kit-medical","kiwi-bird","l","landmark","language","laptop","laptop-code","laptop-medical","lari-sign","layer-group","leaf","left-long","left-right","lemon","less-than","less-than-equal","life-ring","lightbulb","link","link-slash","lira-sign","list","list-check","list-ol","list-ul","litecoin-sign","location-arrow","location-crosshairs","location-dot","location-pin","lock","lock-open","lungs","lungs-virus","m","magnet","magnifying-glass","magnifying-glass-dollar","magnifying-glass-location","magnifying-glass-minus","magnifying-glass-plus","manat-sign","map","map-location","map-location-dot","map-pin","marker","mars","mars-and-venus","mars-double","mars-stroke","mars-stroke-right","mars-stroke-up","martini-glass","martini-glass-citrus","martini-glass-empty","mask","mask-face","masks-theater","maximize","medal","memory","menorah","mercury","message","meteor","microchip","microphone","microphone-lines","microphone-lines-slash","microphone-slash","microscope","mill-sign","minimize","minus","mitten","mobile","mobile-button","mobile-screen-button","money-bill","money-bill-1","money-bill-1-wave","money-bill-wave","money-check","money-check-dollar","monument","moon","mortar-pestle","mosque","motorcycle","mountain","mug-hot","mug-saucer","music","n","naira-sign","network-wired","neuter","newspaper","not-equal","note-sticky","notes-medical","o","object-group","object-ungroup","oil-can","om","otter","outdent","p","pager","paint-roller","paintbrush","palette","pallet","panorama","paper-plane","paperclip","parachute-box","paragraph","passport","paste","pause","paw","peace","pen","pen-clip","pen-fancy","pen-nib","pen-ruler","pen-to-square","pencil","people-arrows-left-right","people-carry-box","pepper-hot","percent","person","person-biking","person-booth","person-dots-from-line","person-dress","person-hiking","person-praying","person-running","person-skating","person-skiing","person-skiing-nordic","person-snowboarding","person-swimming","person-walking","person-walking-with-cane","peseta-sign","peso-sign","phone","phone-flip","phone-slash","phone-volume","photo-film","piggy-bank","pills","pizza-slice","place-of-worship","plane","plane-arrival","plane-departure","plane-slash","play","plug","plus","plus-minus","podcast","poo","poo-storm","poop","power-off","prescription","prescription-bottle","prescription-bottle-medical","print","pump-medical","pump-soap","puzzle-piece","q","qrcode","question","quote-left","quote-right","r","radiation","rainbow","receipt","record-vinyl","rectangle-ad","rectangle-list","rectangle-xmark","recycle","registered","repeat","reply","reply-all","republican","restroom","retweet","ribbon","right-from-bracket","right-left","right-long","right-to-bracket","ring","road","robot","rocket","rotate","rotate-left","rotate-right","route","rss","ruble-sign","ruler","ruler-combined","ruler-horizontal","ruler-vertical","rupee-sign","rupiah-sign","s","sailboat","satellite","satellite-dish","scale-balanced","scale-unbalanced","scale-unbalanced-flip","school","scissors","screwdriver","screwdriver-wrench","scroll","scroll-torah","sd-card","section","seedling","server","shapes","share","share-from-square","share-nodes","shekel-sign","shield","shield-blank","shield-virus","ship","shirt","shoe-prints","shop","shop-slash","shower","shrimp","shuffle","shuttle-space","sign-hanging","signal","signature","signs-post","sim-card","sink","sitemap","skull","skull-crossbones","slash","sleigh","sliders","smog","smoking","snowflake","snowman","snowplow","soap","socks","solar-panel","sort","sort-down","sort-up","spa","spaghetti-monster-flying","spell-check","spider","spinner","splotch","spoon","spray-can","spray-can-sparkles","square","square-arrow-up-right","square-caret-down","square-caret-left","square-caret-right","square-caret-up","square-check","square-envelope","square-full","square-h","square-minus","square-parking","square-pen","square-phone","square-phone-flip","square-plus","square-poll-horizontal","square-poll-vertical","square-root-variable","square-rss","square-share-nodes","square-up-right","square-xmark","stairs","stamp","star","star-and-crescent","star-half","star-half-stroke","star-of-david","star-of-life","sterling-sign","stethoscope","stop","stopwatch","stopwatch-20","store","store-slash","street-view","strikethrough","stroopwafel","subscript","suitcase","suitcase-medical","suitcase-rolling","sun","superscript","swatchbook","synagogue","syringe","t","table","table-cells","table-cells-large","table-columns","table-list","table-tennis-paddle-ball","tablet","tablet-button","tablet-screen-button","tablets","tachograph-digital","tag","tags","tape","taxi","teeth","teeth-open","temperature-empty","temperature-full","temperature-half","temperature-high","temperature-low","temperature-quarter","temperature-three-quarters","tenge-sign","terminal","text-height","text-slash","text-width","thermometer","thumbs-down","thumbs-up","thumbtack","ticket","ticket-simple","timeline","toggle-off","toggle-on","toilet","toilet-paper","toilet-paper-slash","toolbox","tooth","torii-gate","tower-broadcast","tractor","trademark","traffic-light","trailer","train","train-subway","train-tram","transgender","trash","trash-arrow-up","trash-can","trash-can-arrow-up","tree","triangle-exclamation","trophy","truck","truck-fast","truck-medical","truck-monster","truck-moving","truck-pickup","truck-ramp-box","tty","turkish-lira-sign","turn-down","turn-up","tv","u","umbrella","umbrella-beach","underline","universal-access","unlock","unlock-keyhole","up-down","up-down-left-right","up-long","up-right-and-down-left-from-center","up-right-from-square","upload","user","user-astronaut","user-check","user-clock","user-doctor","user-gear","user-graduate","user-group","user-injured","user-large","user-large-slash","user-lock","user-minus","user-ninja","user-nurse","user-pen","user-plus","user-secret","user-shield","user-slash","user-tag","user-tie","user-xmark","users","users-gear","users-slash","utensils","v","van-shuttle","vault","vector-square","venus","venus-double","venus-mars","vest","vest-patches","vial","vials","video","video-slash","vihara","virus","virus-covid","virus-covid-slash","virus-slash","viruses","voicemail","volleyball","volume-high","volume-low","volume-off","volume-xmark","vr-cardboard","w","wallet","wand-magic","wand-magic-sparkles","wand-sparkles","warehouse","water","water-ladder","wave-square","weight-hanging","weight-scale","wheelchair","whiskey-glass","wifi","wind","window-maximize","window-minimize","window-restore","wine-bottle","wine-glass","wine-glass-empty","won-sign","wrench","x","x-ray","xmark","y","yen-sign","yin-yang","z"];
    let brandsList = ["42-group","500px","accessible-icon","accusoft","adn","adversal","affiliatetheme","airbnb","algolia","alipay","amazon","amazon-pay","amilia","android","angellist","angrycreative","angular","app-store","app-store-ios","apper","apple","apple-pay","artstation","asymmetrik","atlassian","audible","autoprefixer","avianex","aviato","aws","bandcamp","battle-net","behance","behance-square","bilibili","bimobject","bitbucket","bitcoin","bity","black-tie","blackberry","blogger","blogger-b","bluetooth","bluetooth-b","bootstrap","bots","btc","buffer","buromobelexperte","buy-n-large","buysellads","canadian-maple-leaf","cc-amazon-pay","cc-amex","cc-apple-pay","cc-diners-club","cc-discover","cc-jcb","cc-mastercard","cc-paypal","cc-stripe","cc-visa","centercode","centos","chrome","chromecast","cloudflare","cloudscale","cloudsmith","cloudversify","cmplid","codepen","codiepie","confluence","connectdevelop","contao","cotton-bureau","cpanel","creative-commons","creative-commons-by","creative-commons-nc","creative-commons-nc-eu","creative-commons-nc-jp","creative-commons-nd","creative-commons-pd","creative-commons-pd-alt","creative-commons-remix","creative-commons-sa","creative-commons-sampling","creative-commons-sampling-plus","creative-commons-share","creative-commons-zero","critical-role","css3","css3-alt","cuttlefish","d-and-d","d-and-d-beyond","dailymotion","dashcube","deezer","delicious","deploydog","deskpro","dev","deviantart","dhl","diaspora","digg","digital-ocean","discord","discourse","dochub","docker","draft2digital","dribbble","dribbble-square","dropbox","drupal","dyalog","earlybirds","ebay","edge","edge-legacy","elementor","ello","ember","empire","envira","erlang","ethereum","etsy","evernote","expeditedssl","facebook","facebook-f","facebook-messenger","facebook-square","fantasy-flight-games","fedex","fedora","figma","firefox","firefox-browser","first-order","first-order-alt","firstdraft","flickr","flipboard","fly","font-awesome","fonticons","fonticons-fi","fort-awesome","fort-awesome-alt","forumbee","foursquare","free-code-camp","freebsd","fulcrum","galactic-republic","galactic-senate","get-pocket","gg","gg-circle","git","git-alt","git-square","github","github-alt","github-square","gitkraken","gitlab","gitter","glide","glide-g","gofore","golang","goodreads","goodreads-g","google","google-drive","google-pay","google-play","google-plus","google-plus-g","google-plus-square","google-wallet","gratipay","grav","gripfire","grunt","guilded","gulp","hacker-news","hacker-news-square","hackerrank","hashnode","hips","hire-a-helper","hive","hooli","hornbill","hotjar","houzz","html5","hubspot","ideal","imdb","instagram","instagram-square","instalod","intercom","internet-explorer","invision","ioxhost","itch-io","itunes","itunes-note","java","jedi-order","jenkins","jira","joget","joomla","js","js-square","jsfiddle","kaggle","keybase","keycdn","kickstarter","kickstarter-k","korvue","laravel","lastfm","lastfm-square","leanpub","less","line","linkedin","linkedin-in","linode","linux","lyft","magento","mailchimp","mandalorian","markdown","mastodon","maxcdn","mdb","medapps","medium","medrt","meetup","megaport","mendeley","microblog","microsoft","mix","mixcloud","mixer","mizuni","modx","monero","napster","neos","nimblr","node","node-js","npm","ns8","nutritionix","octopus-deploy","odnoklassniki","odnoklassniki-square","old-republic","openbag","openid","opera","optin-monster","orcid","osi","padlet","page4","pagelines","palfed","patreon","paypal","perbyte","periscope","phabricator","phoenix-framework","phoenix-squadron","php","pied-piper","pied-piper-alt","pied-piper-hat","pied-piper-pp","pied-piper-square","pinterest","pinterest-p","pinterest-square","pix","playstation","product-hunt","pushed","python","qq","quinscape","quora","r-project","raspberry-pi","ravelry","react","reacteurope","readme","rebel","red-river","reddit","reddit-alien","reddit-square","redhat","renren","replyd","researchgate","resolving","rev","rocketchat","rockrms","rust","safari","salesforce","sass","schlix","scribd","searchengin","sellcast","sellsy","servicestack","shirtsinbulk","shopify","shopware","simplybuilt","sistrix","sith","sitrox","sketch","skyatlas","skype","slack","slideshare","snapchat","snapchat-square","soundcloud","sourcetree","speakap","speaker-deck","spotify","square-font-awesome","square-font-awesome-stroke","squarespace","stack-exchange","stack-overflow","stackpath","staylinked","steam","steam-square","steam-symbol","sticker-mule","strava","stripe","stripe-s","studiovinari","stumbleupon","stumbleupon-circle","superpowers","supple","suse","swift","symfony","teamspeak","telegram","tencent-weibo","the-red-yeti","themeco","themeisle","think-peaks","tiktok","trade-federation","trello","tumblr","tumblr-square","twitch","twitter","twitter-square","typo3","uber","ubuntu","uikit","umbraco","uncharted","uniregistry","unity","unsplash","untappd","ups","usb","usps","ussunnah","vaadin","viacoin","viadeo","viadeo-square","viber","vimeo","vimeo-square","vimeo-v","vine","vk","vnv","vuejs","watchman-monitoring","waze","weebly","weibo","weixin","whatsapp","whatsapp-square","whmcs","wikipedia-w","windows","wirsindhandwerk","wix","wizards-of-the-coast","wodu","wolf-pack-battalion","wordpress","wordpress-simple","wpbeginner","wpexplorer","wpforms","wpressr","xbox","xing","xing-square","y-combinator","yahoo","yammer","yandex","yandex-international","yarn","yelp","yoast","youtube","youtube-square","zhihu"];

    // Grab icon containers
    let regularContainer = document.getElementById('regular-container');
    let solidContainer = document.getElementById('solid-container');
    let brandsContainer = document.getElementById('brands-container');

    // Set icons counters
    document.getElementById('regular-counter').innerText = regularList.length;
    document.getElementById('solid-counter').innerText = solidList.length;
    document.getElementById('brands-counter').innerText = brandsList.length;

    // Add regular icons
    regularList.forEach(icon => {
      // Create icon element
      let iconRegularDiv = document.createElement('div');
      let iconRegularP = document.createElement('p');
      let iconRegularI = document.createElement('i');
      let iconRegularCode = document.createElement('code');

      // Set up elements
      iconRegularDiv.classList.add('col');
      iconRegularDiv.classList.add('col-sm-6');
      iconRegularDiv.classList.add('col-lg-4');
      iconRegularDiv.classList.add('col-xl-3');

      iconRegularI.classList.add('far');
      iconRegularI.classList.add('fa-2x');
      iconRegularI.classList.add('fa-' + icon);
      
      iconRegularP.appendChild(iconRegularI);

      iconRegularCode.innerText = icon;

      iconRegularDiv.appendChild(iconRegularP);
      iconRegularDiv.appendChild(iconRegularCode);

      // Add them to container
      regularContainer.appendChild(iconRegularDiv);
    });

    // Add solid icons
    solidList.forEach(icon => {
      // Create icon element
      let iconSolidDiv = document.createElement('div');
      let iconSolidP = document.createElement('p');
      let iconSolidI = document.createElement('i');
      let iconSolidCode = document.createElement('code');

      // Set up elements
      iconSolidDiv.classList.add('col');
      iconSolidDiv.classList.add('col-sm-6');
      iconSolidDiv.classList.add('col-lg-4');
      iconSolidDiv.classList.add('col-xl-3');

      iconSolidI.classList.add('fa');
      iconSolidI.classList.add('fa-2x');
      iconSolidI.classList.add('fa-' + icon);
      
      iconSolidP.appendChild(iconSolidI);

      iconSolidCode.innerText = icon;

      iconSolidDiv.appendChild(iconSolidP);
      iconSolidDiv.appendChild(iconSolidCode);

      // Add them to container
      solidContainer.appendChild(iconSolidDiv);
    });

    // Add brands icons
    brandsList.forEach(icon => {
      // Create icon element
      let iconBrandsDiv = document.createElement('div');
      let iconBrandsP = document.createElement('p');
      let iconBrandsI = document.createElement('i');
      let iconBrandsCode = document.createElement('code');

      // Set up elements
      iconBrandsDiv.classList.add('col');
      iconBrandsDiv.classList.add('col-sm-6');
      iconBrandsDiv.classList.add('col-lg-4');
      iconBrandsDiv.classList.add('col-xl-3');

      iconBrandsI.classList.add('fab');
      iconBrandsI.classList.add('fa-2x');
      iconBrandsI.classList.add('fa-' + icon);
      
      iconBrandsP.appendChild(iconBrandsI);

      iconBrandsCode.innerText = icon;

      iconBrandsDiv.appendChild(iconBrandsP);
      iconBrandsDiv.appendChild(iconBrandsCode);

      // Add them to container
      brandsContainer.appendChild(iconBrandsDiv);
    });
  }

  /*
   * Icon Search functionality
   *
   */
  static iconSearch() {
    let searchItems = document.querySelectorAll('.js-icon-list > div > code');
    let searchForm = document.querySelector('.js-form-icon-search');
    let searchInput = document.querySelector('.js-icon-search');
    let searchValue = '';

    // Disable form submission
    searchForm.addEventListener('submit', e => e.preventDefault());

    // When user types
    searchInput.addEventListener('keyup', e => {
      searchValue = searchInput.value;

      if (searchValue.length > 2) { // If ore than 2 characters, search the icons
        searchItems.forEach(item => {
          if (item.textContent.includes(searchValue)) {
            item.parentNode.classList.remove('d-none');
          } else {
            item.parentNode.classList.add('d-none');
          }
        });
      } else if (searchValue.length === 0) { // If text was deleted, show all icons
        searchItems.forEach(item => {
          item.parentNode.classList.remove('d-none');
        });
      }
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.iconsInit();
    this.iconSearch();
  }
}

// Initialize when page loads
One.onLoad(pageIcons.init());