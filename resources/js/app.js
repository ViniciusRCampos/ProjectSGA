import $ from 'jquery';
import 'bootstrap';
import './bootstrap';
import 'jquery-mask-plugin';
import toastr from "toastr";
import "toastr/build/toastr.min.css";
import Swal from 'sweetalert2';


toastr.options = {
  closeButton: true,
  progressBar: true,
  positionClass: "toast-top-right",
};

window.$ = $;
window.jQuery = $;
window.toastr = toastr;
window.Swal = Swal;
