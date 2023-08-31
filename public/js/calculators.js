function getQ(Vg,n,eta){return( (Vg*n)/1000*eta);}
function getVg(Q,n,eta){return (Q*1000/n/eta);}
function getNp2(Q,P,eta){return( (Q*P)/(612*eta));}
function getQp2(N,eta,P){return N*612*eta/P;}
function getPp2(N,eta,Q){return N*612*eta/Q;}
function getMp3(N,n){return 9555*N/n;}
function getMp4(Vg,P,eta){return (1.59*Vg*P*eta)/1000;}
function getVgp4(M,P,eta){return M/(1.59*P*eta)*1000;}
function getPp4(M,Vg,eta){return M/(1.59*Vg*eta)*1000;}
function getnp5(Q,Vg,eta){return Q/(Vg/1000)*eta;}
function getdp6(Q,v){return Math.sqrt((Q*21.2)/v);}
function getvp6(Q,d){    return (Q*21.2)/(d*d);}
function getQp6(d,v){return (d*d*v)/21.2;}
function getSpp7(fi){return (fi/2/10)*(fi/2/10)*3.141592;}
function getSstp7(fs){return (fs/2/10)*(fs/2/10)*3.141592;}
function getSap7(fi,fs){return getSpp7(fi)-getSstp7(fs);}
function getVispp7(fi,L){return getSpp7(fi)*L/10/1000;}
function getVisptp7(fi,L,n){return getVispp7(fi,L)*n;}
function getViap7(fi,fs,L){return getSap7(fi,fs)*L/10/1000;}
function getViatp7(fi,fs,L,n){return getViap7(fi,fs,L)*n;}
function getQsp7(v,fi){return getSpp7(fi)*v/10;}
function getQtp7(v,fi,fs){return getSap7(fi,fs)*v/10;}
function getKQp7(fi,fs,v){return getSpp7(fi)/getSap7(fi,fs)*getQsp7(v,fi);}
function getNsp7(v,fi,P){return getQsp7(v,fi)*P/400*0.736;}
function getNtp7(v,fi,fs,P){return getQtp7(v,fi,fs)*P/400*0.736;}
function getFsp7(fi,P){return getSpp7(fi)*P;}
function getFstp7(fi,P,n){return getFsp7(fi,P)*n;}
function getFtp7(fi,fs,P){return getSap7(fi,fs)*P;}
function getFttp7(fi,fs,P,n){return getFtp7(fi,fs,P)*n;}
function getSpp8(Fst,P,n){return Fst/(P*n);}
function getfip8(Fst,P,n){return Math.sqrt(getSpp8(Fst,P,n)*400/(3.141592));}
function getPp8(Fst,n,Sp){return Fst/(n*Sp);}
function getvp8(L,t){return L/t*(0.06);}
function getcubg(W,D,L){return 6*W*(2*D-L)*(L-D)/2;}
function getcubv(W,D,L){return (12*W*(L+D)/4*(L-D)/2) }

String.prototype.rpl = function() { var str=this; str=str.replace(/,/gi, '.'); return str*1; }

//oil pipe form
if (undefined !== document.forms['oil-pipe']) {
  document.forms['oil-pipe'].get_Q.onclick = function() {
    var d = document.forms['oil-pipe'].d.value;  d=d.rpl();
    var v = document.forms['oil-pipe'].v.value;  v=v.rpl();
    var result = getQp6(d, v);
    document.forms['oil-pipe'].result.value = result;
  }
  document.forms['oil-pipe'].get_d.onclick = function() {
    var Q = document.forms['oil-pipe'].Q.value; Q=Q.rpl();
    var v = document.forms['oil-pipe'].v.value;  v=v.rpl();
    var result = getdp6(Q, v);
    document.forms['oil-pipe'].result.value = result;	
  }
  document.forms['oil-pipe'].get_v.onclick = function() {
    var Q = document.forms['oil-pipe'].Q.value; Q=Q.rpl();
    var d = document.forms['oil-pipe'].d.value; d=d.rpl();
    var result = getvp6(Q, d);
    document.forms['oil-pipe'].result.value = result;	
  }
}

//output-torque form
if (undefined !== document.forms['output-torque']) {
  document.forms['output-torque'].get_M.onclick = function() {
    var Vg = document.forms['output-torque'].Vg.value;  Vg=Vg.rpl();
    var P = document.forms['output-torque'].P.value;  P=P.rpl();
    var eta = document.forms['output-torque'].eta.value; eta=eta.rpl();
    var result = getMp4(Vg, P, eta);
    document.forms['output-torque'].result.value = result;
  }
  document.forms['output-torque'].get_P.onclick = function() {
    var M = document.forms['output-torque'].M.value;  M=M.rpl();
    var Vg = document.forms['output-torque'].Vg.value; Vg=Vg.rpl();
    var eta = document.forms['output-torque'].eta.value; eta=eta.rpl();
    var result = getPp4(M, Vg, eta);
    document.forms['output-torque'].result.value = result;
  }
  document.forms['output-torque'].get_Q.onclick = function() {
    var M = document.forms['output-torque'].M.value; M=M.rpl();
    var P = document.forms['output-torque'].P.value; P=P.rpl();
    var eta = document.forms['output-torque'].eta.value; eta=eta.rpl();
    var result = getVgp4(M, P, eta);
    document.forms['output-torque'].result.value = result;
  }
}

//output-torque-convert form
if (undefined !== document.forms['output-torque-convert']) {
  document.forms['output-torque-convert'].to_nm.onclick = function() {
    var Kgm = document.forms['output-torque-convert'].Kgm.value;  Kgm=Kgm.rpl();
    var result = Kgm * 9.81;
    document.forms['output-torque-convert'].Nm.value = result;
  }
}

//output-power form
if (undefined !== document.forms['output-power']) {
  document.forms['output-power'].get_N.onclick = function() {
    var Q = document.forms['output-power'].Q.value; Q=Q.rpl();
    var P = document.forms['output-power'].P.value; P=P.rpl();
    var eta = document.forms['output-power'].eta.value; eta=eta.rpl();
    var result = getNp2(Q, P, eta);
    document.forms['output-power'].result.value = result;
  }
  document.forms['output-power'].get_P.onclick = function() {
    var N = document.forms['output-power'].N.value; N=N.rpl();
    var eta = document.forms['output-power'].eta.value; eta=eta.rpl();
    var Q = document.forms['output-power'].Q.value; Q=Q.rpl();
    var result = getPp2(N, eta, Q);
    document.forms['output-power'].result.value = result;
  }
  document.forms['output-power'].get_Q.onclick = function() {
    var N = document.forms['output-power'].N.value; N=N.rpl();
    var eta = document.forms['output-power'].eta.value; eta=eta.rpl();
    var P = document.forms['output-power'].P.value; P=P.rpl();
    var result = getQp2(N, eta, P);
    document.forms['output-power'].result.value = result;
  }
}

//output-power-convert form
if (undefined !== document.forms['output-power-convert']) {
  document.forms['output-power-convert'].to_cv.onclick = function() {
    var kW = document.forms['output-power-convert'].kW.value; kW=kW.rpl();
    var result = kW * 1.36;
    document.forms['output-power-convert'].CV.value = result;
  }
  document.forms['output-power-convert'].to_kw.onclick = function() {
    var CV = document.forms['output-power-convert'].CV.value; CV=CV.rpl();
    var result = CV * 0.736;
    document.forms['output-power-convert'].kW.value = result;
  }
}

//Unknown Cylinder form
if (undefined !== document.forms['unknown-cylinder']) {
  document.forms['unknown-cylinder'].get_Sp.onclick = function() {
    var Fst = document.forms['unknown-cylinder'].Fst.value; Fst=Fst.rpl();
    var P = document.forms['unknown-cylinder'].P.value; P=P.rpl();
    var n = document.forms['unknown-cylinder'].n.value; n=n.rpl();
    var result = getSpp8(Fst, P, n);
    document.forms['unknown-cylinder'].result.value = result;
  }
  document.forms['unknown-cylinder'].get_P.onclick = function() {
    var Fst = document.forms['unknown-cylinder'].Fst.value; Fst=Fst.rpl();
    var n = document.forms['unknown-cylinder'].n.value; n=n.rpl();
    var Sp = document.forms['unknown-cylinder'].Sp.value; Sp=Sp.rpl();
    var result = getPp8(Fst, n, Sp);
    document.forms['unknown-cylinder'].result.value = result;
  }
  document.forms['unknown-cylinder'].get_fi.onclick = function() {
    var Fst = document.forms['unknown-cylinder'].Fst.value; Fst=Fst.rpl();
    var P = document.forms['unknown-cylinder'].P.value; P=P.rpl();
    var n = document.forms['unknown-cylinder'].n.value; n=n.rpl();
    var result = getfip8(Fst, P, n);
    document.forms['unknown-cylinder'].result.value = result;
  }
  document.forms['unknown-cylinder'].get_v.onclick = function() {
    var L = document.forms['unknown-cylinder'].L.value; L=L.rpl();
    var t = document.forms['unknown-cylinder'].t.value; t=t.rpl();
    var result = getvp8(L, t);
    document.forms['unknown-cylinder'].result.value = result;
  }
}

//Known Cylinder form
if (undefined !== document.forms['known-cylinder']) {
  document.forms['known-cylinder'].get_Sp.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var result = getSpp7(fi);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Sst.onclick = function() {
    var fs = document.forms['known-cylinder'].fs.value;  fs=fs.rpl();
    var result = getSstp7(fs);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Sa.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var fs = document.forms['known-cylinder'].fs.value; fs=fs.rpl();
    var result = getSap7(fi, fs);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Visp.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var L = document.forms['known-cylinder'].L.value; L=L.rpl();
    var result = getVispp7(fi, L);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Vispt.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var L = document.forms['known-cylinder'].L.value; L=L.rpl();
    var n = document.forms['known-cylinder'].n.value;  n=n.rpl();
    var result = getVisptp7(fi, L, n);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Via.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var fs = document.forms['known-cylinder'].fs.value; fs=fs.rpl();
    var L = document.forms['known-cylinder'].L.value; L=L.rpl();
    var result = getViap7(fi, fs, L);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Viat.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var fs = document.forms['known-cylinder'].fs.value; fs=fs.rpl();
    var L = document.forms['known-cylinder'].L.value;  L=L.rpl();
    var n = document.forms['known-cylinder'].n.value;  n=n.rpl();
    var result = getViatp7(fi, fs, L, n);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Qs.onclick = function() {
    var v = document.forms['known-cylinder'].v.value;  v=v.rpl();
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var result = getQsp7(v, fi);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Qt.onclick = function() {
    var v = document.forms['known-cylinder'].v.value;  v=v.rpl();
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var fs = document.forms['known-cylinder'].fs.value; fs=fs.rpl();
    var result = getQtp7(v, fi, fs);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Kq.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var fs = document.forms['known-cylinder'].fs.value; fs=fs.rpl();
    var v = document.forms['known-cylinder'].v.value; v=v.rpl();
    var result = getKQp7(fi, fs, v);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Ns.onclick = function() {
    var v = document.forms['known-cylinder'].v.value;  v=v.rpl();
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var P = document.forms['known-cylinder'].P.value; P=P.rpl();
    var result = getNsp7(v, fi, P);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Nt.onclick = function() {
    var v = document.forms['known-cylinder'].v.value; v=v.rpl();
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var fs = document.forms['known-cylinder'].fs.value; fs=fs.rpl();
    var P = document.forms['known-cylinder'].P.value; P=P.rpl();
    var result = getNtp7(v, fi, fs, P);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Fs.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var P = document.forms['known-cylinder'].P.value; P=P.rpl();
    var result = getFsp7(fi, P);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Fst.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var P = document.forms['known-cylinder'].P.value; P=P.rpl();
    var n = document.forms['known-cylinder'].n.value; n=n.rpl();
    var result = getFstp7(fi, P, n);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Ft.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var fs = document.forms['known-cylinder'].fs.value; fs=fs.rpl();
    var P = document.forms['known-cylinder'].P.value; P=P.rpl();
    var result = getFtp7(fi, fs, P);
    document.forms['known-cylinder'].result.value = result;
  }
  document.forms['known-cylinder'].get_Fft.onclick = function() {
    var fi = document.forms['known-cylinder'].fi.value; fi=fi.rpl();
    var fs = document.forms['known-cylinder'].fs.value; fs=fs.rpl();
    var P = document.forms['known-cylinder'].P.value; P=P.rpl();
    var n = document.forms['known-cylinder'].n.value; n=n.rpl();
    var result = getFttp7(fi, fs, P, n);
    document.forms['known-cylinder'].result.value = result;
  }	
}

//Hydraulic Motor Speed form
if (undefined !== document.forms['motor-speed']) {
  document.forms['motor-speed'].get_n.onclick = function() {
    var Q = document.forms['motor-speed'].Q.value; Q=Q.rpl();
    var Vg = document.forms['motor-speed'].Vg.value; Vg=Vg.rpl();
    var eta = document.forms['motor-speed'].eta.value; eta=eta.rpl();
    var result = getnp5(Q, Vg, eta);
    document.forms['motor-speed'].result.value = result;
  }	
}

//Pump flow form
if (undefined !== document.forms['pump-flow']) {
  document.forms['pump-flow'].get_Vg.onclick = function() {
    var Q = document.forms['pump-flow'].Q.value;   Q=Q.rpl();
    var n = document.forms['pump-flow'].n.value;  n=n.rpl();
    var eta = document.forms['pump-flow'].eta.value; eta=eta.rpl();
    var result = getVg(Q, n, eta);
    document.forms['pump-flow'].result.value = result;
  }
  document.forms['pump-flow'].get_Q.onclick = function() {
    var Vg = document.forms['pump-flow'].Vg.value; Vg=Vg.rpl();
    var n = document.forms['pump-flow'].n.value; n=n.rpl();
    var eta = document.forms['pump-flow'].eta.value; eta=eta.rpl();
    var result = getQ(Vg, n, eta);
    document.forms['pump-flow'].result.value = result;
  }
}

// Cubic Inches Displacement gear
if (undefined !== document.forms['pump-cub']) {
  document.forms['pump-cub'].getres.onclick = function() {
    var W = document.forms['pump-cub'].W.value; W=W.rpl();
    var D = document.forms['pump-cub'].D.value; D=D.rpl();
    var L = document.forms['pump-cub'].L.value; L=L.rpl();
    document.forms['pump-cub'].result.value = 6*W*(2*D-L)*(L-D)/2;;
  }

}

// Cubic Inches Displacement vane
if (undefined !== document.forms['pump-cubv']) {
  document.forms['pump-cubv'].getres.onclick = function() {
    var W = document.forms['pump-cubv'].W.value; W=W.rpl();
    var D = document.forms['pump-cubv'].D.value; D=D.rpl();
    var L = document.forms['pump-cubv'].L.value; L=L.rpl();
    document.forms['pump-cubv'].result.value = 12*W*(L+D)/4*(L-D)/2;
  }

}

//Input Torque form
if (undefined !== document.forms['input-torque']) {
    document.forms['input-torque'].get_M.onclick = function() {
    var N = document.forms['input-torque'].N.value; N=N.rpl();
    var n = document.forms['input-torque'].n.value; n=n.rpl();
    var result = getMp3(N, n);
    document.forms['input-torque'].result.value = result;
  }
}
