# -*- coding: utf-8 -*-
import futurama
import logging
try:
    from django.core.cache import cache
except ImportError:
    cache = None

class AddQuote():

    def process_response(self, request, response):
        try:
            quote = futurama.get_header(cache=cache)
            response[quote[0]] = quote[1]
        except IOError, e:
            try:
                logging.error("Caught IO exception %s" % (e))
            except ImportError:
                #probably running on the 'wrong' version of python
                pass
        return response