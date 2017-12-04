var tip_editor_config = {
  path_absolute: "{{ URL::to('/') }}/",
  theme: 'inlite',
  inline: true,
  selector: "#tip",
  plugins: 'link paste contextmenu textpattern',
  insert_toolbar: '',
  selection_toolbar: 'bold italic | h2 h3',
  relative_urls: false,
}

var counter_editor_config = {
  path_absolute: "{{ URL::to('/') }}/",
  theme: 'inlite',
  inline: true,
  selector: "#counter",
  plugins: 'link paste contextmenu textpattern',
  insert_toolbar: '',
  selection_toolbar: 'bold italic | h2 h3',
  relative_urls: false,
}

var editor_config = {
  path_absolute: "{{ URL::to('/') }}/",
  theme: 'inlite',
  inline: true,
  selector: "#tip",
  plugins: 'link advlist lists paste contextmenu textpattern autolink',
  insert_toolbar: '',
  selection_toolbar: 'bold italic | quicklink h2 h3 | alignleft aligncenter alignright alignjustify | bullist numlist',
  relative_urls: false,
}

tinymce.init(tip_editor_config)
tinymce.init(counter_editor_config)
