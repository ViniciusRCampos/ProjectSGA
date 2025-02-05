import $ from 'jquery';
import 'bootstrap';
import './bootstrap';
import 'jquery-mask-plugin';
import toastr from "toastr";
import "toastr/build/toastr.min.css";

toastr.options = {
  closeButton: true,
  progressBar: true,
  positionClass: "toast-top-right",
};

window.$ = $;
window.jQuery = $;
window.toastr = toastr;
