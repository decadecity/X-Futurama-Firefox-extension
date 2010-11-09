# -*- coding: utf-8 -*-
import csv, os, random, sys

"""
Returns a tuple containing a header and a quote.

This code is placed in the public domain.
"""

def get_header(cache=None):
    quote_list = []
    if cache is not None:
        try:
            quote_list = cache.get('futurama://', [])
        except:
            pass
    if len(quote_list) == 0:
      quote_list = []
      for quote in csv.reader(open(os.path.dirname(__file__)+'/futurama.csv')):
          if len(quote) == 2:
              quote_list.append(quote)
    if len(quote_list) == 0:
        quote_list.append(('Bender','Well, we\'re boned!'))
    if cache is not None:
        try:
            cache.set('futurama://', quote_list)
        except:
            pass
    quote = quote_list[random.randrange(0,len(quote_list))]
    return ('X-%s' % quote[0].replace(' ','-'),quote[1])

if __name__ == '__main__':
    print get_header()
