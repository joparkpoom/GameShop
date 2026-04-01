


<div id="footer-main">
  <div class="wrap-footer">
      <div class="inner-wrap-footer">
          <div class="box-logo">
              <div class="flex items-center flex-col text-center">
                  <img
                      loading="lazy"
                      src="{{asset('/storage/images/logo.png')}}"
                      alt="จ้าวเจ๊ง168 สล็อตเครดิตฟรี pg slot jaojeng168 pgslotเครดิตฟรี สล็อตเว็บตรง สล็อตเว็บตรงแตกง่าย"
                  />
                  <p>
                      เว็บรวมเกมส์อันดับ 1 ของไทย เหนือกว่า ในทุกด้าน <br />
                      สะดวกกว่าในทุกมุมมอง มิติใหม่ เว็บเกม เล่นได้ทุกเกมส์
                  </p>
              </div>
          </div>
          <div class="box-logo-brand-game">
              <p>ค่ายเกม</p>
              <div class="wrap-logo-brand-game">
                @foreach ($vender as $key=>$item)
                @if ($item['icon']) 
                    <div class="item-logo-brand-game">
                      <div class="inner-item-logo-brand-game"><img loading="lazy" src="{{env('LINK_SPACES_CENTER').$item['icon']}}" width="60" height="60" alt="" /></div>
                  </div>
                @endif
                    
                @endforeach
                  
           
              </div>
          </div>
          <div class="box-payment-method">
              <p>{{__('member/footer.payment')}}</p>
              <div class="wrap-logo-bank">
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/baac.svg')}}" width="60" height="60" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/bay.svg')}}" width="60" height="60" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/bbl.svg')}}" width="60" height="60" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/bnp.svg')}}" width="60" height="60" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/boa.svg')}}" width="60" height="60" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/cacib.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/cimb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/citi.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/db.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/ghb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/gsb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/hsbc.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/ibank.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/icbc.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/kbank.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/kk.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/ktb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/lhbank.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/mb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/mega.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/mufg.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/rbs.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/scb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/scbi.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/smbc.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/tbank.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/tcrb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/tisco.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/tmb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/true.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/ttb.svg')}}" width="25" height="25" alt="" /></div>
                  <div class="item-logo-bank"><img class="rounded-md" loading="lazy" src="{{asset('/storage/images/bank/uob.svg')}}" width="25" height="25" alt="" /></div> 
              </div>
          </div>
          
          
      </div>
  </div> 
</div>



<div class="box-contact active-contact" id="contact-slide">

  <div class="flex flex-col">
    @php
    $line = DB::select('select token from settings where name = ?', ['line']);
    @endphp
    <a  href="{{$line[0]->token}}">
          <img
              loading="lazy"
              src="data:image/png;base64,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"
              alt=""
          />
      </a>
      
  </div>
</div>

 