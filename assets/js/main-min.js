$(document).ready(function(){if(function(){const e=document.querySelector("body"),t=document.querySelector("html"),o=document.querySelector(".js-open-nav"),n=document.querySelector(".header__menu");let r=!1;const a=function(){window.innerWidth<=768&&o.addEventListener("click",()=>{r?(e.style.overflowY="scroll",t.style.overflowY="scroll",n.classList.remove("nav-open"),o.classList.remove("nav-open"),setTimeout(()=>{r=!1},1)):(e.style.overflowY="hidden",t.style.overflowY="hidden",n.classList.add("nav-open"),o.classList.add("nav-open"),setTimeout(()=>{r=!0},1))})};a(),window.addEventListener("resize",()=>{a(),e.style.overflowY="scroll",t.style.overflowY="scroll",n.classList.remove("nav-open"),o.classList.remove("nav-open"),r=!1})}(),$("#tabs li a").click(function(){var e=$(this).attr("id");$(this).hasClass("inactive")&&($("#tabs li a").addClass("inactive"),$(this).removeClass("inactive"),$(".container").hide(),$("#"+e+"C").fadeIn("slow"))}),$(".js-question-toggle").each(function(e,t){$(t).parent().parent().addClass("is-closed")}),$(".js-question-toggle").click(function(e){$(e.target).parent().parent().toggleClass("is-closed")}),document.querySelector(".js-packages")){const e=new IntersectionObserver(e=>{e.forEach(e=>{e.isIntersecting?e.target.querySelectorAll(".js-percentage").forEach(e=>{e.style.animationDelay=".5s",e.style.transition="all 2s ease",e.style.transform="rotate(var(--rotation-2))"}):e.target.querySelectorAll(".js-percentage").forEach(e=>{e.style.animationDelay="0s",e.style.transition="none",e.style.transform="rotate(0deg)"})})});document.querySelectorAll(".js-gauge").forEach(t=>{e.observe(t)})}if(document.querySelector(".wrapper--slider")){function e(){!function(e,t){const o=document.querySelector(e),n=window.getComputedStyle(o),r=parseInt(n.getPropertyValue("padding-left")),a=parseInt(n.getPropertyValue("margin-left"));document.querySelectorAll(t).forEach(function(e){e.style.paddingLeft=r+"px",e.style.marginLeft=a+"px"})}(".hero .wrapper",".wrapper--slider")}e(),window.addEventListener("resize",e)}if(document.querySelector(".locations-map")){const e=document.querySelectorAll(".js-map-name");document.querySelectorAll(".js-area-marker");e.forEach(e=>{e.addEventListener("mouseenter",()=>{const t=e.dataset.location.replace(/\s/g,"\\ "),o=document.querySelector(`.js-area-marker[data-location=${t}] img`),n=o.src;o.parentElement.classList.add("map-hovered");const r=n.replace("location.png","location-green.png");o.src=r}),e.addEventListener("mouseout",()=>{const t=e.dataset.location.replace(/\s/g,"\\ "),o=document.querySelector(`.js-area-marker[data-location=${t}] img`),n=o.src;o.parentElement.classList.remove("map-hovered");const r=n.replace("location-green.png","location.png");o.src=r})})}});