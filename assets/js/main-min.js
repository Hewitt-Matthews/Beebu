$(document).ready(function(){if(function(){const e=document.querySelector("body"),t=document.querySelector("html"),o=document.querySelector(".js-open-nav"),s=document.querySelector(".header__menu");let n=!1;const r=function(){window.innerWidth<=768&&o.addEventListener("click",()=>{n?(e.style.overflowY="scroll",t.style.overflowY="scroll",s.classList.remove("nav-open"),o.classList.remove("nav-open"),setTimeout(()=>{n=!1},1)):(e.style.overflowY="hidden",t.style.overflowY="hidden",s.classList.add("nav-open"),o.classList.add("nav-open"),setTimeout(()=>{n=!0},1))})};r(),window.addEventListener("resize",()=>{r(),e.style.overflowY="scroll",t.style.overflowY="scroll",s.classList.remove("nav-open"),o.classList.remove("nav-open"),n=!1})}(),$("#tabs li a").click(function(){var e=$(this).attr("id");$(this).hasClass("inactive")&&($("#tabs li a").addClass("inactive"),$(this).removeClass("inactive"),$(".container").hide(),$("#"+e+"C").fadeIn("slow"))}),$(".js-question-toggle").each(function(e,t){$(t).parent().parent().addClass("is-closed")}),$(".js-question-toggle").click(function(e){$(e.target).parent().parent().toggleClass("is-closed")}),document.querySelector(".js-packages")){const e=new IntersectionObserver(e=>{e.forEach(e=>{e.isIntersecting?e.target.querySelectorAll(".js-percentage").forEach(e=>{e.style.animationDelay=".5s",e.style.transition="all 2s ease",e.style.transform="rotate(var(--rotation-2))"}):e.target.querySelectorAll(".js-percentage").forEach(e=>{e.style.animationDelay="0s",e.style.transition="none",e.style.transform="rotate(0deg)"})})});document.querySelectorAll(".js-gauge").forEach(t=>{e.observe(t)})}if(document.querySelector(".wrapper--slider")){function e(){!function(e,t){const o=document.querySelector(e),s=window.getComputedStyle(o),n=parseInt(s.getPropertyValue("padding-left")),r=parseInt(s.getPropertyValue("margin-left"));document.querySelectorAll(t).forEach(function(e){e.style.paddingLeft=n+"px",e.style.marginLeft=r+"px"})}(".wrapper",".wrapper--slider")}e(),window.addEventListener("resize",e)}if(document.querySelector(".js-comparison-grid-mob")){const e=document.querySelector(".js-comparison-grid-mob"),t=document.querySelectorAll(".js-comparison-grid-mob");e.classList.add("open"),e.classList.add("beebu-table-el"),t.forEach(e=>{e.classList.contains("beebu-table-el")||e.addEventListener("click",()=>{e.classList.contains("open")?e.classList.remove("open"):e.classList.add("open")})})}if(document.querySelector(".locations-map")){const e=document.querySelectorAll(".js-map-name");document.querySelectorAll(".js-area-marker");e.forEach(e=>{e.addEventListener("mouseenter",()=>{const t=e.dataset.location.replace(/\s/g,"\\ "),o=document.querySelector(`.js-area-marker[data-location=${t}] img`),s=o.src;o.parentElement.classList.add("map-hovered");const n=s.replace("location.png","location-green.png");o.src=n}),e.addEventListener("mouseout",()=>{const t=e.dataset.location.replace(/\s/g,"\\ "),o=document.querySelector(`.js-area-marker[data-location=${t}] img`),s=o.src;o.parentElement.classList.remove("map-hovered");const n=s.replace("location-green.png","location.png");o.src=n})})}"/careers/"===window.location.pathname&&(document.querySelector("body").classList.add("careers-page"),document.querySelector(".flourish-hero .button").classList.remove("button--black"),document.querySelector(".flourish-hero .button").classList.add("button--green"))});